<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Salary;
use App\Models\Attendance\Month;
use App\Models\Attendance\Year;
use App\Models\Attendance\Teacher;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class SalaryController extends Controller
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
        
        $datas = Salary::orderBy('id','DESC')->paginate(5);
        return view('attendance.salaries.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Salary::get();
        
        $months=Month::pluck('name','id');
        $years=Year::pluck('name','id');
        $teachers=Teacher::pluck('name','id');
        
        return view('attendance.salaries.create',compact('datas','months', 'years','teachers'));
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
            'teacher_id' => 'required',
            'payable_days' => 'required',
            'basic' => 'required',
            'month_id' => 'required',
            'year_id' => 'required',
        ]);
        $month=Month::find($request->input('month_id'));
        $salaries = Salary::create([
            'sdate' => Carbon::parse($request->input('sdate'))->format('Y-m-d H:i:s'),
            'teacher_id' => $request->input('teacher_id'),
            'days' => $month->days, 
            'payable_days' => $request->input('payable_days'),
            'basic' => $request->input('basic'),
            'house_rent' => $request->input('house_rent'),
            'transport' => $request->input('transport'),
            'medical' => $request->input('medical'),
            'month_id' => $request->input('month_id'),
            'year_id' => $request->input('year_id'),
            'user_id' => auth()->user()->id
            ]);
        // check wheather students are avaiable to entry
        
        return redirect()->route('salaries.index')
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
        $data = Salary::find($id);
        return view('attendance.salaries.show',compact('data'));
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
        $years=Year::pluck('name','id');
        $teachers=Teacher::pluck('name','id');
        
        $data = Salary::find($id);
        return view('attendance.salaries.edit',compact('data','months', 'years','teachers'));
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
    
        $salaries = Salary::find($id);
        $salaries->teacher_id = $request->input('teacher_id');
        $salaries->presence = $request->input('presence');
        $salaries->absence = $request->input('absence');
        $salaries->weekend = $request->input('weekend');
        $salaries->leave = $request->input('leave');
        $salaries->holidy = $request->input('holidy');
        $salaries->adate = Carbon::parse($request->input('adate'))->format('Y-m-d H:i:s');
        $salaries->save();
    
        return redirect()->route('salaries.index')
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
        DB::table("salary")->where('id',$id)->delete();
        return redirect()->route('salaries.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function mrefresh(Request $request)
    {
        $request->session()->forget('s_id','c_id');

        return redirect()->route('salaries.create')
        ->with('success','Memory refreshed successfully');

    }
    public function delete($id)
    {
        $data = Salary::find($id);

        return view('attendance.salaries.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Salary::orderBy('id','DESC')->get();    
        $i=0;
        return view('attendance.salaries.report', compact('data', 'datas','i'));
    }
}
