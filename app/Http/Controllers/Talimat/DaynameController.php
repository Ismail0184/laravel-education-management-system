<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Dayname;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class DaynameController extends Controller
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
        
        $datas = Dayname::orderBy('id','DESC')->paginate(10);
        return view('talimat.daynames.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Dayname::get();
        return view('talimat.daynames.create',compact('datas'));
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
    
        $daynames = Dayname::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('daynames.index')
            ->with('success','Dayname created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dayname::find($id);
        return view('daynames.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daynames = Dayname::find($id);
        return view('talimat.daynames.edit',compact('daynames'));
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
        ]);
    
        $daynames = Dayname::find($id);
        $daynames->name = $request->input('name');
        $daynames->save();
    
        return redirect()->route('daynames.index')
                        ->with('success','Dayname updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("dayname")->where('id',$id)->delete();
        return redirect()->route('daynames.index')
                        ->with('success','Dayname deleted successfully');
    }
    public function delete($id)
    {
        $data = Dayname::find($id);

        return view('talimat.daynames.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        $data = Madrasha::find(1);
        $datas = Dayname::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.daynames.report', compact('data', 'datas','i','banglans'));
    }
}
