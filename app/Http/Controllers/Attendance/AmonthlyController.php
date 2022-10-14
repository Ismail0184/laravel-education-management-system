<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Amonthly;
use App\Models\Attendance\Month;
use App\Models\Attendance\Year;
use App\Models\Attendance\Teacher;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class AmonthlyController extends Controller
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
        
        $datas = Amonthly::orderBy('id','DESC')->paginate(5);
        return view('attendance.amonthlys.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Amonthly::get();
        
        $months=Month::pluck('name','id');
        $years=Year::pluck('year','id');
        $teachers=Teacher::pluck('name','id');
        
        return view('attendance.amonthlys.create',compact('datas','months', 'years','teachers'));
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
            'presence' => 'required',
            'weekend' => 'required',
            'adate' => 'required',
        ]);
         
        $amonthlys = Amonthly::create([
            'teacher_id' => $request->input('teacher_id'),
            'presence' => $request->input('presence'),
            'absence' => $request->input('absence'),
            'weekend' => $request->input('weekend'),
            'leave' => $request->input('leave'),
            'holiday' => $request->input('holiday'),
            'adate' => Carbon::parse($request->input('adate'))->format('Y-m-d H:i:s'),
            'month_id' => $request->input('month_id'),
            'year_id' => $request->input('year_id'),
            'user_id' => auth()->user()->id
            ]);
        // check wheather students are avaiable to entry
        
        return redirect()->route('amonthlys.index')
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
        $data = Amonthly::find($id);
        return view('attendance.amonthlys.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $months=Month::pluck('name','id');
        $years=Year::pluck('year','id');
        $teachers=Teacher::pluck('name','id');
        
        $data = Amonthly::find($id);
        return view('attendance.amonthlys.edit',compact('data','months', 'years','teachers'));
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
            'presence' => 'required',
            'weekend' => 'required',
            'adate' => 'required',
        ]);
    
        $amonthlys = Amonthly::find($id);
        $amonthlys->teacher_id = $request->input('teacher_id');
        $amonthlys->presence = $request->input('presence');
        $amonthlys->absence = $request->input('absence');
        $amonthlys->weekend = $request->input('weekend');
        $amonthlys->leave = $request->input('leave');
        $amonthlys->holiday = $request->input('holiday');
        $amonthlys->adate = Carbon::parse($request->input('adate'))->format('Y-m-d H:i:s');
        $amonthlys->save();
    
        return redirect()->route('amonthlys.index')
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
        DB::table("amonthly")->where('id',$id)->delete();
        return redirect()->route('amonthlys.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function mrefresh(Request $request)
    {
        $request->session()->forget('s_id','c_id');

        return redirect()->route('amonthlys.create')
        ->with('success','Memory refreshed successfully');

    }
    public function delete($id)
    {
        $data = Amonthly::find($id);

        return view('attendance.amonthlys.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Amonthly::orderBy('id','DESC')->get();    
        $i=0;
        return view('attendance.amonthlys.report', compact('data', 'datas','i'));
    }
}
