<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Atype;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class AtypeController extends Controller
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
        
        $datas = Atype::orderBy('id','DESC')->paginate(10);
        return view('attendance.atypes.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Atype::get();
        return view('attendance.atypes.create',compact('datas'));
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
    
        $atypes = Atype::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('atypes.index')
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
        $data = Atype::find($id);
        return view('atypes.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atypes = Atype::find($id);
        return view('attendance.atypes.edit',compact('atypes'));
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
    
        $atypes = Atype::find($id);
        $atypes->name = $request->input('name');
        $atypes->save();
    
        return redirect()->route('atypes.index')
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
        DB::table("atype")->where('id',$id)->delete();
        return redirect()->route('atypes.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Atype::find($id);

        return view('attendance.atypes.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Atype::orderBy('id','DESC')->get();    
        $i=0;
        return view('attendance.atypes.report', compact('data', 'datas','i'));
    }
}
