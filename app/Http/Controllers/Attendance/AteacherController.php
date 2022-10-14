<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Ateacher;
use App\Models\Attendance\Atype;
use App\Models\Attendance\Amethod;
use App\Models\Attendance\Teacher;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class AteacherController extends Controller
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
        
        $datas = Ateacher::orderBy('id','DESC')->paginate(5);
        return view('attendance.ateachers.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Ateacher::get();
        $teachers=Teacher::pluck('name','id');
        $atypes=Atype::pluck('name','id');
        $amethods=Amethod::pluck('name','id');
        
        return view('attendance.ateachers.create',compact('datas','teachers', 'atypes', 'amethods'));
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
            'teacher_id' => 'required|integer',
            'atype_id' => 'required',
            'amethod_id' => 'required',
            'adate' => 'required',
        ]);
         
        $ateachers = Ateacher::create([
            'teacher_id' => $request->input('teacher_id'),
            'atype_id' => $request->input('atype_id'),
            'amethod_id' => $request->input('amethod_id'),
            'adate' => Carbon::parse($request->input('adate'))->format('Y-m-d H:i:s'),
            'time_in' => $request->input('time_in'),
            'time_out' => $request->input('time_out'),
            'note' => $request->input('note'),
            'user_id' => auth()->user()->id
            ]);
        // check wheather students are avaiable to entry
        
        return redirect()->route('ateachers.index')
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
        $data = Ateacher::find($id);
        return view('attendance.ateachers.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers=Teacher::pluck('name','id');
        $atypes=Atype::pluck('name','id');
        $amethods=Amethod::pluck('name','id');
        
        $data = Ateacher::find($id);
        return view('attendance.ateachers.edit',compact('data','teachers', 'atypes','amethods'));
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
            'teacher_id' => 'required|integer',
            'atype_id' => 'required',
            'adate' => 'required',
        ]);
    
        $ateachers = Ateacher::find($id);
        $ateachers->teacher_id = $request->input('teacher_id');
        $ateachers->atype_id = $request->input('atype_id');
        $ateachers->amethod_id = $request->input('amethod_id');
        $ateachers->adate = $request->input('adate');
        $ateachers->time_in = $request->input('time_in');
        $ateachers->time_out = $request->input('time_out');
        $ateachers->note = $request->input('note');
        $ateachers->save();
    
        return redirect()->route('ateachers.index')
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
        DB::table("ateacher")->where('id',$id)->delete();
        return redirect()->route('ateachers.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function mrefresh(Request $request)
    {
        $request->session()->forget('s_id','c_id');

        return redirect()->route('ateachers.create')
        ->with('success','Memory refreshed successfully');

    }
    public function delete($id)
    {
        $data = Ateacher::find($id);

        return view('attendance.ateachers.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Ateacher::orderBy('id','DESC')->get();    
        $i=0;
        return view('attendance.ateachers.report', compact('data', 'datas','i'));
    }
}
