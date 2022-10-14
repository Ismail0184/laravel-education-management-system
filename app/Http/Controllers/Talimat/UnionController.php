<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Union;
use App\Models\Talimat\Thana;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class UnionController extends Controller
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
        
        $datas = Union::orderBy('id','DESC')->paginate(5);
        return view('talimat.unions.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Union::get();
        $thanas = Thana::pluck('name', 'id');
        return view('talimat.unions.create',compact('data','thanas'));
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
            'thana_id' => 'required',
        ]);
    
        $unions = Union::create([
            'name' => $request->input('name'),
            'thana_id' => $request->input('thana_id'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('unions.index')
            ->with('success', trans('lang.createdsuccessfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Union::find($id);
        return view('talimat.unions.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thanas = Thana::pluck('name', 'id');
        $data = Union::find($id);

        return view('talimat.unions.edit',compact('data','thanas'));
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
            'name' => 'required|max:100',
            'thana_id' => 'required',
        ]);
    
        $unions = Union::find($id);
        $unions->name = $request->input('name');
        $unions->thana_id = $request->input('thana_id');
        $unions->user_id = $request->input('user_id');
        $unions->save();
    
        return redirect()->route('unions.index')
                        ->with('success', trans('lang.updatedsuccessfully'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("union")->where('id',$id)->delete();
        return redirect()->route('unions.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Union::find($id);

        return view('talimat.unions.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');
 
        $data = Madrasha::find(1);
        $datas = Union::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.unions.report', compact('data', 'datas','i','banglans'));
    }
}
