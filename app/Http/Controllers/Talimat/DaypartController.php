<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Daypart;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class DaypartController extends Controller
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
        
        $datas = Daypart::orderBy('id','DESC')->paginate(10);
        return view('talimat.dayparts.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Daypart::get();
        return view('talimat.dayparts.create',compact('datas'));
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
    
        $dayparts = Daypart::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('dayparts.index')
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
        $data = Daypart::find($id);
        return view('talimat.dayparts.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dayparts = Daypart::find($id);
        return view('talimat.dayparts.edit',compact('dayparts'));
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
    
        $dayparts = Daypart::find($id);
        $dayparts->name = $request->input('name');
        $dayparts->save();
    
        return redirect()->route('dayparts.index')
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
        DB::table("daypart")->where('id',$id)->delete();
        return redirect()->route('dayparts.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Daypart::find($id);

        return view('talimat.dayparts.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        
        $data = Madrasha::find(1);
        $datas = Daypart::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.dayparts.report', compact('data', 'datas','i','banglans'));
    }
}
