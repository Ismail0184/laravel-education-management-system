<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Classroutine;
use App\Models\Talimat\Dayname;
use App\Models\Talimat\Ghanta;
use App\Models\Talimat\Subject;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Teacher;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class ClassroutineController extends Controller
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
        
        if (Session::get('dn_id') !== null && Session::get('c_id') == null && Session::get('t_id') == null){
            $dayname_id=Session::get('dn_id');
            $datas = Classroutine::where('dayname_id',$dayname_id)->orderBy('id','DESC')->paginate(10);
        } elseif (Session::get('dn_id') == null && Session::get('c_id') !== null && Session::get('t_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Classroutine::where('classes_id',$classes_id)->orderBy('id','DESC')->paginate(10);
        } elseif (Session::get('dn_id') == null && Session::get('c_id') == null && Session::get('t_id') !== null){
            $teacher_id=Session::get('t_id');
            $datas = Classroutine::where('teacher_id',$teacher_id)->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Classroutine::orderBy('id','DESC')->paginate(10);
        }
       
        return view('talimat.classroutines.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $s_id=Session::get('s_id')+1;
        $c_id=Session::get('c_id');
        $dn_id=Session::get('dn_id');
        $g_id=Session::get('g_id')+1;

        $daynames = Dayname::pluck('name', 'id');
        $ghantas = Ghanta::pluck('name', 'id');
        if (Session::get('c_id')){
            $subjects = Subject::where('classes_id', $c_id)->pluck('name', 'id');
        } 
            else {
                $subjects = Subject::pluck('name', 'id');
        }
        
        $classes = Classes::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        $datas = Classroutine::get();
        

        return view('talimat.classroutines.create',compact('datas','daynames','ghantas','subjects','classes','teachers', 's_id', 'c_id', 'dn_id', 'g_id'));
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
            'classes_id' => 'required',
            'dayname_id' => 'required',
            'ghanta_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);
    
        $classroutines = Classroutine::create([
            'classes_id' => $request->input('classes_id'),
            'dayname_id' => $request->input('dayname_id'),
            'ghanta_id' => $request->input('ghanta_id'),
            'subject_id' => $request->input('subject_id'),
            'teacher_id' => $request->input('teacher_id'),
            'user_id' => auth()->user()->id
            ]);
        
            Session::put('s_id', $request->input('subject_id'));
            Session::put('c_id', $request->input('classes_id'));
            Session::put('dn_id', $request->input('dayname_id'));
            Session::put('g_id', $request->input('ghanta_id'));


        return redirect()->route('classroutines.index')
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
        $data = Classroutine::find($id);
        return view('talimat.classroutines.show',compact('data'));
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
        $ghantas = Ghanta::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');

        $data = Classroutine::find($id);
        return view('talimat.classroutines.edit',compact('data','daynames','ghantas','subjects','classes','teachers'));
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
            'classes_id' => 'required',
            'dayname_id' => 'required',
            'ghanta_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);
    
        $classroutines = Classroutine::find($id);
        $classroutines->classes_id = $request->input('classes_id');
        $classroutines->dayname_id = $request->input('dayname_id');
        $classroutines->ghanta_id = $request->input('ghanta_id');
        $classroutines->subject_id = $request->input('subject_id');
        $classroutines->save();
    
        return redirect()->route('classroutines.index')
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
        DB::table("classroutine")->where('id',$id)->delete();
        return redirect()->route('classroutines.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Classroutine::find($id);

        return view('talimat.classroutines.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        
        $data = Madrasha::find(1);
        if (Session::get('dn_id') !== null && Session::get('c_id') == null && Session::get('t_id') == null){
            $dayname_id=Session::get('dn_id');
            $datas = Classroutine::where('dayname_id',$dayname_id)->orderBy('id','DESC')->get();
        } elseif (Session::get('dn_id') == null && Session::get('c_id') !== null && Session::get('t_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Classroutine::where('classes_id',$classes_id)->orderBy('id','DESC')->get();
        } elseif (Session::get('dn_id') == null && Session::get('c_id') == null && Session::get('t_id') !== null){
            $teacher_id=Session::get('t_id');
            $datas = Classroutine::where('teacher_id',$teacher_id)->orderBy('id','DESC')->get();
        } else {
            $datas = Classroutine::orderBy('id','DESC')->paginate(10);
        }

        $i=0;
        return view('talimat.classroutines.report', compact('data', 'datas','i','banglans'));
    }
}
