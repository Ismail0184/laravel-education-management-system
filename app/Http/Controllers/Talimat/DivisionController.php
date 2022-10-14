<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Division;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banglans = Bnumber::pluck('name', 'id');
        
        $datas = Division::orderBy('id','DESC')->paginate(10);
        return view('talimat.departments.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Division::get();
        return view('talimat.departments.create',compact('datas'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
    
        $departments = Division::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('departments.index')
            ->with('success','Division created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Division::find($id);
        return view('talimat.departments.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Division::find($id);
        return view('talimat.departments.edit',compact('departments'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $departments = Division::find($id);
        $departments->name = $request->input('name');
        $departments->save();
    
        return redirect()->route('departments.index')
                        ->with('success','Division updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("department")->where('id',$id)->delete();
        return redirect()->route('departments.index')
                        ->with('success','Division deleted successfully');
    }
    public function delete($id)
    {
        $data = Division::find($id);

        return view('talimat.departments.delete', compact('data'));
    }


    public function report() {
        $data = Madrasha::find(1);
        $datas = Division::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.departments.report', compact('data', 'datas','i'));
    }
}
