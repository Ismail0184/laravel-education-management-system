<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Mumtahin;
use App\Models\Talimat\Teacher;
use App\Models\Talimat\classes;
use App\Models\Talimat\Subject;
use App\Models\Talimat\Examname;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MumtahinController extends Controller
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
        
        $datas = Mumtahin::orderBy('id','DESC')->paginate(5);
        return view('talimat.mumtahins.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');
        $datas = Mumtahin::get();
        $selectedID =0;
        return view('talimat.mumtahins.create',compact('datas','teachers','classes', 'subjects', 'examnames'));
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
            'classes_id' => 'required',
            'subject_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $mumtahins = Mumtahin::create([
            'teacher_id' => $request->input('teacher_id'),
            'classes_id' => $request->input('classes_id'),
            'subject_id' => $request->input('subject_id'),
            'examname_id' => $request->input('examname_id'),
            'nesab' => $request->input('nesab'),
            'last_date' => Carbon::parse($request->input('last_date'))->format('Y-m-d H:i:s'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('mumtahins.index')
            ->with('success',trans('lang.createdsuccessfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mumtahin::find($id);
        return view('mumtahins.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');
        $mumtahin = Mumtahin::find($id);
        return view('talimat.mumtahins.edit',compact('mumtahin','teachers','classes','subjects','examnames'));
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
            'teacher_id' => 'required',
            'classes_id' => 'required',
            'subject_id' => 'required',
            'examname_id' => 'required',
           ]);
    
        $mumtahins = Mumtahin::find($id);
        $mumtahins->teacher_id = $request->input('teacher_id');
        $mumtahins->classes_id = $request->input('classes_id');
        $mumtahins->subject_id = $request->input('subject_id');
        $mumtahins->examname_id = $request->input('examname_id');
        $mumtahins->nesab = $request->input('nesab');
        $mumtahins->last_date = $request->input('last_date');
        $mumtahins->save();
    
        return redirect()->route('mumtahins.index')
                        ->with('success',trans('lang.updatedsuccessfully'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("mumtahin")->where('id',$id)->delete();
        return redirect()->route('mumtahins.index')
                        ->with('warning',trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Mumtahin::find($id);

        return view('talimat.mumtahins.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        $data = Madrasha::find(1);
        $datas = Mumtahin::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.mumtahins.report', compact('data', 'datas','i','banglans'));
    }
}
