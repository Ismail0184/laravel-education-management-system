<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Astudent;
use App\Models\Attendance\Atype;
use App\Models\Attendance\Amethod;
use App\Models\Attendance\Admission;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class AstudentController extends Controller
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
        
        $datas = Astudent::orderBy('id','DESC')->paginate(5);
        return view('attendance.astudents.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Astudent::get();
        $students=Admission::pluck('name','id');
        $atypes=Atype::pluck('name','id');
        $amethods=Amethod::pluck('name','id');
        
        return view('attendance.astudents.create',compact('datas','students', 'atypes','amethods'));
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
            'admission_id' => 'required|integer',
            'atype_id' => 'required',
            'amethod_id' => 'required',
            'adate' => 'required',
        ]);
         
        $astudents = Astudent::create([
            'admission_id' => $request->input('admission_id'),
            'atype_id' => $request->input('atype_id'),
            'amethod_id' => $request->input('amethod_id'),
            'adate' => Carbon::parse($request->input('adate'))->format('Y-m-d H:i:s'),
            'time_in' => $request->input('time_in'),
            'time_out' => $request->input('time_out'),
            'note' => $request->input('note'),
            'user_id' => auth()->user()->id
            ]);
        // check wheather students are avaiable to entry
        
        return redirect()->route('astudents.index')
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
        $data = Astudent::find($id);
        return view('attendance.astudents.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $students=Admission::pluck('name','id');
        $atypes=Atype::pluck('name','id');
        $amethods=Amethod::pluck('name','id');
        
        $data = Astudent::find($id);
        return view('attendance.astudents.edit',compact('data','students', 'atypes','amethods'));
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
            'admission_id' => 'required|integer',
            'atype_id' => 'required',
            'amethod_id' => 'required',
            'adate' => 'required',
        ]);
    
        $astudents = Astudent::find($id);
        $astudents->admission_id = $request->input('admission_id');
        $astudents->atype_id = $request->input('atype_id');
        $astudents->amethod_id = $request->input('amethod_id');
        $astudents->adate = $request->input('adate');
        $astudents->time_in = $request->input('time_in');
        $astudents->time_out = $request->input('time_out');
        $astudents->note = $request->input('note');
        $astudents->save();
    
        return redirect()->route('astudents.index')
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
        DB::table("astudent")->where('id',$id)->delete();
        return redirect()->route('astudents.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function mrefresh(Request $request)
    {
        $request->session()->forget('s_id','c_id');

        return redirect()->route('astudents.create')
        ->with('success','Memory refreshed successfully');

    }
    public function delete($id)
    {
        $data = Astudent::find($id);

        return view('attendance.astudents.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Astudent::orderBy('id','DESC')->get();    
        $i=0;
        return view('attendance.astudents.report', compact('data', 'datas','i'));
    }
}
