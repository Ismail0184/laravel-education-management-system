<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Result;
use App\Models\Talimat\Subject;
use App\Models\Talimat\Admission;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Examname;
use App\Models\Talimat\Status;
use App\Models\Talimat\Student_has_for_result;
use App\Models\Madrasha;
use App\Models\Bnumber;

use Illuminate\Http\Request;
use Session;
use DB;

class ResultController extends Controller
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
        $classes_id=null;
        $admission_id=null;
        
        if (Session::get('s_id') !== null){
            $subject_id=Session::get('s_id');
            $datas = Result::where('subject_id',$subject_id)->orderBy('id','DESC')->paginate(10);
        } elseif (Session::get('a_id') !== null){
            $admission_id=Session::get('a_id');
            $classes_id=Session::get('c_id');
            $datas = Result::where('student_id',$admission_id)->orderBy('id','DESC')->paginate(10);
        } elseif (Session::get('c_id') !== null){
            $admission_id=Session::get('a_id');
            $classes_id=Session::get('c_id');
            $datas = Result::where('classes_id',$classes_id)->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Result::orderBy('id','DESC')->paginate(10);
        }
            
        return view('talimat.results.index',compact('datas','banglans','classes_id','admission_id'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Result::get();
        $classes=Classes::pluck('name','id');
        $exams=Examname::pluck('name','id');
        
        $s_id=Session::get('s_id');
        $e_id=Session::get('e_id');
        $a_id=Session::get('a_id');
        $subject=Subject::find($s_id);
        $subject ? $c_id=$subject->classes->id : $c_id=0;
        
        if($c_id) {
            $students=Admission::where('classes_id',$c_id)->pluck('name','id');
            $subjects=Subject::where('classes_id',$c_id)->pluck('name','id');
        } else {
            $students=Admission::pluck('name','id');
            $subjects=Subject::pluck('name','id');
        
        }
        
        return view('talimat.results.create',compact('datas','subjects','students','classes','exams', 's_id','c_id','a_id','e_id'));
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
            'mark' => 'required',
            'subject_id' => 'required',
            'student_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        // create student_has_for_result
        if (Session::get('a_id') == null){
            DB::table('student_has_for_result')->truncate();
            $students=Admission::where('classes_id', $request->input('classes_id'))->get();
            foreach ($students as $key => $student){
                $result=Result::where('student_id',$student->id)->where('subject_id',$request->input('subject_id'))->where('examname_id',$request->input('examname_id'))->first();
                 if ($result ==null) {
                    $student_has_for_result = Student_has_for_result::create([ 
                        'admission_id' => $student->id,
                        'user_id' => auth()->user()->id,
                    ]);
                }
            }
            Session::put('student_has_for_result', false);   
        }

    
    $subject=Subject::find($request->input('subject_id'));

    ($subject->fail_mark !==0 && 
    $request->input('mark') < $subject->fail_mark) && 
    ($request->input('mark') + $subject->grace_mark) >= $subject->fail_mark 
    ? $grace_mark=($subject->fail_mark - $request->input('mark')) : $grace_mark=0;

    (($request->input('mark') + $subject->grace_mark) < $subject->fail_mark) ? $fail=1 : $fail=0;

    $result=Result::where('student_id',$request->input('student_id'))->where('subject_id',$request->input('subject_id'))->where('examname_id',$request->input('examname_id'))->first();
    if($result == null){    
    $check_clss_student=$students=Admission::where('classes_id', $subject->classes_id)->where('id',$request->input('student_id'))->first();
        if ($check_clss_student){
            $results = Result::create([
                'mark' => $request->input('mark'),
                'fail' => $fail,
                'grace_mark' => $grace_mark,
                'classes_id' => $subject->classes_id,
                'subject_id' => $subject->id,
                'student_id' => $request->input('student_id'),
                'examname_id' => $request->input('examname_id'),
                'user_id' => auth()->user()->id
                ]);
        } 
    }    
        DB::table("student_has_for_result")->where('admission_id',$request->input('student_id'))->delete();
        // check wheather students are avaiable to entry
        $a_data = DB::table('student_has_for_result')->first();

            Session::put('s_id', $request->input('subject_id'));
            Session::put('c_id', $subject->classes_id);
            Session::put('e_id', $request->input('examname_id'));
           
        if ($a_data){    
            Session::put('a_id', $a_data->admission_id);
            return redirect()->route('results.create')
            ->with('success', trans('lang.createdsuccessfully'));} else {
                Session::forget('a_id');
                return redirect()->route('results.index')
                ->with('warning',trans('lang.nostudentisfound'));
            }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Result::find($id);
        return view('talimat.results.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects=Subject::pluck('name','id');
        $students=Admission::pluck('name','id');
        $classes=Classes::pluck('name','id');
        $exams=Examname::pluck('name','id');
        $data = Result::find($id);
        return view('talimat.results.edit',compact('data', 'subjects', 'students', 'classes', 'exams'));
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
            'mark' => 'required',
            'subject_id' => 'required',
            'student_id' => 'required',
            'examname_id' => 'required',
        ]);
        
        $subject=Subject::find($request->input('subject_id'));

        ($subject->fail_mark !==0 && 
        $request->input('mark') < $subject->fail_mark) && 
        ($request->input('mark') + $subject->grace_mark) >= $subject->fail_mark 
        ? $grace_mark=($subject->fail_mark - $request->input('mark')) : $grace_mark=0;
    
        (($request->input('mark') + $subject->grace_mark) < $subject->fail_mark) ? $fail=1 : $fail=0;
        
        $results = Result::find($id);
        $results->mark = $request->input('mark');
        $results->fail = $fail;
        $results->grace_mark = $grace_mark;
        $results->subject_id = $request->input('subject_id');
        $results->student_id = $request->input('student_id');
        $results->examname_id = $request->input('examname_id');
        $results->save();

        


        return redirect()->route('results.index')
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
        DB::table("result")->where('id',$id)->delete();
        return redirect()->route('results.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function mrefresh(Request $request)
    {
        $request->session()->forget('s_id','c_id');

        return redirect()->route('results.create')
        ->with('success','Memory refreshed successfully');

    }
    public function delete($id)
    {
        $data = Result::find($id);

        return view('talimat.results.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        if (Session::get('s_id') !== null){
            $subject_id=Session::get('s_id');
            $datas = Result::where('subject_id',$subject_id)->orderBy('id','DESC')->get();
        } elseif (Session::get('a_id') !== null){
            $admission_id=Session::get('a_id');
            $datas = Result::where('student_id',$admission_id)->orderBy('id','DESC')->get();
        } else {
            $datas = Result::orderBy('id','DESC')->get();
        }        $i=0;
        return view('talimat.results.report', compact('data', 'datas','i'));
    }

    public function marksheet() {
        $data = Madrasha::find(1);
        if (Session::get('a_id') !== null){
            $a_id=Session::get('a_id');
        }        
        $student=Admission::where('id',$a_id)->first();
        $i=0;
        $subjects=Subject::where('classes_id',$student->classes_id)->orderBy('id','ASC')->get();
        $students=Admission::where('classes_id',$student->classes_id)->orderBy('id','ASC')->get();
        $datas=Result::where('classes_id',$student->classes_id)->where('student_id',2)->pluck('mark','subject_id');
        $graces=Result::where('classes_id',$student->classes_id)->where('student_id',2)->pluck('grace_mark','subject_id');
        $fails=Result::where('classes_id',$student->classes_id)->where('student_id',2)->pluck('fail','subject_id');
        
        return view('talimat.results.marksheet', compact('data', 'datas','i','subjects','student','graces','fails'));
    }
    
    public function classresult() {
        $data = Madrasha::find(1);
        
        if (Session::get('a_id') !== null){
            $a_id=Session::get('a_id');
            $student=Admission::where('id',$a_id)->first();
            $c_id=$student->classes_id;
        } elseif (Session::get('c_id') !== null){
            $c_id=Session::get('c_id');
            
        }       
        $i=0;
        $subjects=Subject::where('classes_id',$c_id)->orderBy('id','ASC')->get();
        $students=Admission::where('classes_id',$c_id)->pluck('name','id');
        
        
        
        return view('talimat.results.classresult', compact('data','i','subjects','students','c_id'));
    }

    public static function status($value) {
        
        $c_id=Session::get('c_id');        
        $classes=Classes::where('id',$c_id)->orderBy('id','ASC')->first();
        $statuses=Status::where('classes_id',$c_id)->pluck('name','mark');
        $status='';
        if ($classes !== null) {
            if ($value >= $classes->mumtaj){
                $status= trans('lang.mumtaj');
            } elseif ($value >= $classes->jjiddan && $value < $classes->mumtaj ){
                $status= trans('lang.jjiddan');
            } elseif ($value >= $classes->jayeed && $value < $classes->jjiddan ){
                $status= trans('lang.jayeed');
            } elseif ($value >= $classes->mokbul && $value < $classes->jayeed ){
                $status= trans('lang.mokbul');
            }else {
                $status= trans('lang.rasib');
            }
            }

                return $status;
    }

}
