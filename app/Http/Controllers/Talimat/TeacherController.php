<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Teacher;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Subject;
use App\Models\Talimat\Union;
use App\Models\Talimat\Thana;
use App\Models\Talimat\District;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use DB;

class TeacherController extends Controller
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
        
        $datas = Teacher::orderBy('id','DESC')->paginate(5);
        return view('talimat.teachers.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Teacher::get();
        $classes = Classes::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');
        $unions = Union::pluck('name', 'id');
        $thanas = Thana::pluck('name', 'id');
        $districts = District::pluck('name', 'id');

        return view('talimat.teachers.create',compact('datas', 'classes','subjects', 'unions', 'thanas', 'districts'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required'
         ]);
        
         if ($validator->fails()) {
            return redirect('teachers/create')
                        ->withErrors($validator)
                        ->withInput();
        }
       $teachers = Teacher::create(
            [
                'name'              => $request->input('name'),
                'fname'             => $request->input('fname'),
                'mname'             => $request->input('mname'),
                'dob'               => Carbon::parse($request->input('dob'))->format('Y-m-d H:i:s'),
                'nationality'       => $request->input('nationality'),
                'mobile'            => $request->input('mobile'),
                'email'             => $request->input('email'),
                'nid'               => $request->input('nid'),
                'specialidentity'   => $request->input('specialidentity'),    
                'caddress'          => $request->input('caddress'),
                'unioun_id'           => $request->input('cunioun'),
                'thana_id'            => $request->input('cthana'),
                'district_id'         => $request->input('cdistrict'),
                'paddress'          => $request->input('paddress'),
                'punioun_id'           => $request->input('punioun'),
                'pthana_id'            => $request->input('pthana'),
                'pdistrict_id'         => $request->input('pdistrict'),
                'highest_jamat'         => $request->input('highest_jamat'),
                'highest_madrasha'         => $request->input('highest_madrasha'),
                'highest_board'         => $request->input('highest_board'),
                'highest_pass_year'         => $request->input('highest_pass_year'),
                'hafez_madrasha'         => $request->input('hafez_madrasha'),
                'hafez_board'         => $request->input('hafez_board'),
                'hafez_pass_year'         => $request->input('hafez_pass_year'),
                'qirat_madrasha'         => $request->input('qirat_madrasha'),
                'qirat_board'         => $request->input('qirat_board'),
                'qirat_pass_year'         => $request->input('qirat_pass_year'),
                'ifta_madrasha'         => $request->input('ifta_madrasha'),
                'ifta_board'         => $request->input('ifta_board'),
                'ifta_pass_year'         => $request->input('ifta_pass_year'),
                'adab_madrasha'         => $request->input('adab_madrasha'),
                'adab_board'         => $request->input('adaba_board'),
                'adab_pass_year'         => $request->input('adab_pass_year'),
                'other_jamat'         => $request->input('other_jamat'),
                'other_madrasha'         => $request->input('other_madrasha'),
                'other_board'         => $request->input('other_board'),
                'other_pass_year'         => $request->input('other_pass_year'),
                'job_madrasha'         => $request->input('job_madrasha'),
                'job_negran_jamat'         => $request->input('job_negran_jamat'),
                'job_kitab'         => $request->input('job_kitab'),
                'job_experience_year'         => $request->input('job_experience_year'),
                'job_note'         => $request->input('job_note'),
                'salary'         => $request->input('salary'),
                'user_id' => auth()->user()->id
                ]);
        return redirect()->route('teachers.index')
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
        $data = Teacher::find($id);
        return view('talimat.teachers.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $classes = Classes::pluck('name', 'id');
        $subjects = Subject::pluck('name', 'id');
        $data = Teacher::find($id);
        $unions = Union::pluck('name', 'id');
        $thanas = Thana::pluck('name', 'id');
        $districts = District::pluck('name', 'id');

        return view('talimat.teachers.edit',compact('data', 'classes','subjects', 'unions', 'thanas', 'districts'));
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
            'name' => 'required',
        ]);
    
        $teachers = Teacher::find($id);
        $teachers->name = $request->input('name');
        $teachers->fname = $request->input('fname');
        $teachers->mname = $request->input('mname');
        $teachers->dob = $request->input('dob');
        $teachers->nationality = $request->input('nationality');
        $teachers->mobile = $request->input('mobile');
        $teachers->email = $request->input('email');
        $teachers->nid = $request->input('nid');
        $teachers->specialidentity = $request->input('specialidentity');
        $teachers->caddress = $request->input('caddress');
        $teachers->union_id = $request->input('union_id');
        $teachers->thana_id = $request->input('thana_id');
        $teachers->district_id = $request->input('district_id');
        $teachers->paddress = $request->input('paddress');
        $teachers->punion_id = $request->input('punion_id');
        $teachers->pthana_id = $request->input('pthana_id');
        $teachers->pdistrict_id = $request->input('pdistrict_id');
        $teachers->highest_jamat = $request->input('highest_jamat');
        $teachers->highest_madrasha = $request->input('highest_madrasha');
        $teachers->highest_board = $request->input('highest_board');
        $teachers->highest_pass_year = $request->input('highest_pass_year');
        $teachers->hafez_madrasha = $request->input('hafez_madrasha');
        $teachers->hafez_board = $request->input('hafez_board');
        $teachers->hafez_pass_year = $request->input('hafez_pass_year');
        $teachers->qirat_madrasha = $request->input('qirat_madrasha');
        $teachers->qirat_board = $request->input('qirat_board');
        $teachers->qirat_pass_year = $request->input('qirat_pass_year');
        $teachers->ifta_madrasha = $request->input('ifta_madrasha');
        $teachers->ifta_board = $request->input('ifta_board');
        $teachers->ifta_pass_year = $request->input('ifta_pass_year');
        $teachers->adab_madrasha = $request->input('adab_madrasha');
        $teachers->adab_board = $request->input('adab_board');
        $teachers->adab_pass_year = $request->input('adab_pass_year');
        $teachers->other_madrasha = $request->input('other_madrasha');
        $teachers->other_board = $request->input('other_board');
        $teachers->other_pass_year = $request->input('other_pass_year');
        $teachers->job_madrasha = $request->input('job_madrasha');
        $teachers->job_negran_jamat = $request->input('job_negran_jamat');
        $teachers->job_kitab = $request->input('job_kitab');
        $teachers->job_experience_year = $request->input('job_experience_year');
        $teachers->job_note = $request->input('job_note');
        $teachers->salary = $request->input('salary');
        $teachers->save();
    
        return redirect()->route('teachers.index')
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
        DB::table("teacher")->where('id',$id)->delete();
        return redirect()->route('teachers.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Teacher::find($id);

        return view('talimat.teachers.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Teacher::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.teachers.report', compact('data', 'datas','i'));
    }
    public function mobile() {
        $data = Madrasha::find(1);
        $datas = Teacher::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.teachers.mobile', compact('data', 'datas','i'));
    }

    public function fileUpload(Request $req){
        $req->validate([
          'imageFile' => 'required',
          'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
    
        if($req->hasfile('imageFile')) {
            foreach($req->file('imageFile') as $file)
            {
                $teacher=Teacher::find($req->input('teacher_id'));
                $name = $file->getClientOriginalName();
                $ext = strtolower($file->getClientOriginalExtension()); // You can use also getClientOriginalName()
                $image_full_name = $teacher->name.'-'.$req->input('image_field').'.'.$ext;
       
                if(File::exists(public_path('teachers/'. $teacher[$req->input('image_field')]))){
                    File::delete(public_path('teachers/'. $teacher[$req->input('image_field')]));
                }
                
                // imge upload

                $file->move(public_path().'/teachers/', $image_full_name);  
                // image url
                
        
                //save in user table
                $teacher[$req->input('image_field')] = $image_full_name;
                $teacher->save();
            }
    
           return back()->with('success', 'File has successfully uploaded!');
        }
      }
}
