<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Examroutine;
use App\Models\Talimat\Dayname;
use App\Models\Talimat\Ghanta;
use App\Models\Talimat\Subject;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Examname;
use App\Models\Talimat\Daypart;
use App\Models\Madrasha;
use App\Models\Bnumber;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;

class ExamroutineController extends Controller
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
        
        if (Session::get('c_id') !== null && Session::get('t_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Examroutine::where('classes_id',$classes_id)->orderBy('id','DESC')->paginate(10);
        } elseif (Session::get('c_id') == null && Session::get('t_id') !== null){
            $teacher_id=Session::get('t_id');
            $datas = Examroutine::where('teacher_id',$teacher_id)->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Examroutine::orderBy('id','DESC')->paginate(10);
        }
        return view('talimat.examroutines.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $s_id=Session::get('s_id');
        $c_id=Session::get('c_id');
        $dn_id=Session::get('dn_id');
        $dp_id=Session::get('dp_id');
        $e_id=Session::get('e_id');

        $daynames = Dayname::pluck('name', 'id');
        $dayparts = Daypart::pluck('name', 'id');
        if ($c_id){
            $subjects = Subject::where('classes_id', $c_id)->pluck('name', 'id');
        } else {
            $subjects = Subject::pluck('name', 'id');
        }
        
        $classes = Classes::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');
        $datas = Examroutine::get();
        $selectedID =0;

        

        return view('talimat.examroutines.create',compact('datas','daynames','dayparts','subjects','classes', 'examnames','s_id', 'c_id', 'dn_id', 'dp_id', 'e_id'));
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
            'exam_date' => 'required',
            'classes_id' => 'required',
            'dayname_id' => 'required',
            'daypart_id' => 'required',
            'subject_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $examroutines = Examroutine::create([
            'exam_date' => Carbon::parse($request->input('exam_date'))->format('Y-m-d H:i:s'),
            'classes_id' => $request->input('classes_id'),
            'dayname_id' => $request->input('dayname_id'),
            'daypart_id' => $request->input('daypart_id'),
            'examname_id' => $request->input('examname_id'),
            'subject_id' => $request->input('subject_id'),
            'user_id' => auth()->user()->id
            ]);
        
            Session::put('s_id', $request->input('subject_id'));
            Session::put('c_id', $request->input('classes_id'));
            Session::put('dn_id', $request->input('dayname_id')+1);
            Session::put('dp_id', $request->input('daypart_id'));
            Session::put('e_id', $request->input('examname_id'));


        return redirect()->route('examroutines.index')
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
        $data = Examroutine::find($id);
        return view('talimat.examroutines.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daynames = Dayname::pluck('name', 'id');
        $dayparts = Daypart::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');

        $s_id=Session::get('s_id');
        $c_id=Session::get('c_id');
        $dn_id=Session::get('dn_id');
        $dp_id=Session::get('dp_id');
        $e_id=Session::get('e_id');

  
        $examroutine = Examroutine::find($id);
        return view('talimat.examroutines.edit',compact('examroutine','daynames','dayparts','subjects','classes', 'examnames'));
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
            'exam_date' => 'required',
            'classes_id' => 'required',
            'dayname_id' => 'required',
            'daypart_id' => 'required',
            'subject_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $examroutines = Examroutine::find($id);
        $examroutines->classes_id = $request->input('classes_id');
        $examroutines->dayname_id = $request->input('dayname_id');
        $examroutines->daypart_id = $request->input('daypart_id');
        $examroutines->subject_id = $request->input('subject_id');
        $examroutines->examname_id = $request->input('examname_id');
        $examroutines->exam_date = $request->input('exam_date');
        $examroutines->save();
    
        return redirect()->route('examroutines.index')
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
        DB::table("examroutine")->where('id',$id)->delete();
        return redirect()->route('examroutines.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Examroutine::find($id);

        return view('talimat.examroutines.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');
        
        $data = Madrasha::find(1);
        if (Session::get('c_id') !== null && Session::get('t_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Examroutine::where('classes_id',$classes_id)->orderBy('id','DESC')->get();
        } elseif (Session::get('c_id') == null && Session::get('t_id') !== null){
            $teacher_id=Session::get('t_id');
            $datas = Examroutine::where('teacher_id',$teacher_id)->orderBy('id','DESC')->get();
        } else {
            $datas = Examroutine::orderBy('id','DESC')->get();
        }
        $i=0;
        return view('talimat.examroutines.report', compact('data', 'datas','i','banglans'));
    }
}
