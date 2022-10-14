<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Admission;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Branch;
use App\Models\Talimat\Union;
use App\Models\Talimat\Thana;
use App\Models\Talimat\District;
use App\Models\Talimat\Monthlyfee;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use DB;
use Session;

class AdmissionController extends Controller
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
        
        if (Session::get('c_id') !== null && Session::get('b_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Admission::where('classes_id',$classes_id)->orderBy('id','DESC')->paginate(10);
        } elseif (Session::get('b_id') !== null){
            $branch_id=Session::get('b_id');
            $datas = Admission::where('branch_id',$branch_id)->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Admission::orderBy('id','DESC')->paginate(10);
        }    

        return view('talimat.admissions.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Admission::get();
        $classes = Classes::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $unions = Union::pluck('name', 'id');
        $thanas = Thana::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        $monthlyfees = Monthlyfee::pluck('monthlyfee', 'id');

        $newroll = DB::table('admission')->max('roll')+1;

        return view('talimat.admissions.create',compact('datas', 'newroll', 'classes', 'branches', 'unions', 'thanas', 'districts', 'monthlyfees'));
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
            'roll'          => 'required',
            'name'          => 'required',
         ]);
        
         if ($validator->fails()) {
            return redirect('admissions/create')
                        ->withErrors($validator)
                        ->withInput();
        }
       $admissions = Admission::create(
            [
                'roll'              => $request->input('roll'),
                'name'              => $request->input('name'),
                'fname'             => $request->input('fname'),
                'mname'             => $request->input('mname'),
                'dob'               => Carbon::parse($request->input('dob'))->format('Y-m-d H:i:s'),
                'nationality'       => $request->input('nationality'),
                'mobile'            => $request->input('mobile'),
                'email'             => $request->input('email'),
                'nid'               => $request->input('nid'),
                'specialidentity'   => $request->input('specialidentity'),    
                'session'           => $request->input('session'),
                'oldornew'          => $request->input('oldornew'),
                'classes_id'        => $request->input('classes_id'),
                'branch_id'         => $request->input('branch_id'),
                'caddress'          => $request->input('caddress'),
                'union_id'          => $request->input('union_id'),
                'thana_id'          => $request->input('thana_id'),
                'district_id'       => $request->input('district_id'),
                'paddress'          => $request->input('paddress'),
                'punion_id'         => $request->input('punion_id'),
                'pthana_id'         => $request->input('pthana_id'),
                'pdistrict_id'      => $request->input('pdistrict_id'),
                'madrasha'          => $request->input('madrasha'),
                'pclass_id'         => $request->input('pclass_id'),
                'classyear'         => $request->input('classyear'),
                'result'            => $request->input('result'),
                'monthlyfee_id'     => $request->input('monthlyfee_id'),
                'user_id' => auth()->user()->id
                ]);
        return redirect()->route('admissions.index')
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
        $data = Admission::find($id);
        return view('talimat.admissions.show',compact('data'));
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
        $branches = Branch::pluck('name', 'id');
        $unions = Union::pluck('name', 'id');
        $thanas = Thana::pluck('name', 'id');
        $districts = District::pluck('name', 'id');
        $monthlyfees = Monthlyfee::pluck('monthlyfee', 'id');

        $data = Admission::find($id);
        return view('talimat.admissions.edit',compact('data', 'classes','branches', 'unions', 'thanas', 'districts', 'monthlyfees'));
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
    
        $admissions = Admission::find($id);
        $admissions->roll = $request->input('roll');
        $admissions->name = $request->input('name');
        $admissions->fname = $request->input('fname');
        $admissions->mname = $request->input('mname');
        $admissions->dob = $request->input('dob');
        $admissions->nationality = $request->input('nationality');
        $admissions->mobile = $request->input('mobile');
        $admissions->email = $request->input('email');
        $admissions->nid = $request->input('nid');
        $admissions->specialidentity = $request->input('specialidentity');
        $admissions->session = $request->input('session');
        $admissions->oldornew = $request->input('oldornew');
        $admissions->classes_id = $request->input('classes_id');
        $admissions->branch_id = $request->input('branch_id');
        $admissions->caddress = $request->input('caddress');
        $admissions->union_id = $request->input('union_id');
        $admissions->thana_id = $request->input('thana_id');
        $admissions->district_id = $request->input('district_id');
        $admissions->paddress = $request->input('paddress');
        $admissions->punion_id = $request->input('punion_id');
        $admissions->pthana_id = $request->input('pthana_id');
        $admissions->pdistrict_id = $request->input('pdistrict_id');
        $admissions->madrasha = $request->input('madrasha');
        $admissions->pclass_id = $request->input('pclass_id');
        $admissions->classyear = $request->input('classyear');
        $admissions->result = $request->input('result');
        $admissions->monthlyfee_id = $request->input('monthlyfee_id');
        $admissions->save();
    
        return redirect()->route('admissions.index')
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
        $student=Admission::find($id);
        
        if(File::exists(public_path('students/'. $student['profile_image_name']))){
            File::delete(public_path('students/'. $student['profile_image_name']));
        }
        
        if(File::exists(public_path('students/'. $student['nid_image_name']))){
            File::delete(public_path('students/'. $student['nid_image_name']));
        }
 
        if(File::exists(public_path('students/'. $student['birth_image_name']))){
            File::delete(public_path('students/'. $student['birth_image_name']));
        }
        DB::table("admission")->where('id',$id)->delete();
        
        return redirect()->route('admissions.index')
                        ->with('success', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Admission::find($id);

        return view('talimat.admissions.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);

        if (Session::get('c_id') !== null && Session::get('b_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Admission::where('classes_id',$classes_id)->orderBy('id','DESC')->get();
        } elseif (Session::get('b_id') !== null){
            $branch_id=Session::get('b_id');
            $datas = Admission::where('branch_id',$branch_id)->orderBy('id','DESC')->get();
        } else {
            $datas = Admission::orderBy('id','DESC')->get();
        }        
        $i=0;
        return view('talimat.admissions.report', compact('data', 'datas','i'));
    }
    public function mobile() {
        $data = Madrasha::find(1);
        if (Session::get('c_id') !== null && Session::get('b_id') == null){
            $classes_id=Session::get('c_id');
            $datas = Admission::where('classes_id',$classes_id)->orderBy('id','DESC')->get();
        } elseif (Session::get('b_id') !== null){
            $branch_id=Session::get('b_id');
            $datas = Admission::where('branch_id',$branch_id)->orderBy('id','DESC')->get();
        } else {
            $datas = Admission::orderBy('id','DESC')->get();
        }        
        $i=0;
        return view('talimat.admissions.mobile', compact('data', 'datas','i'));
    }
    public function fileUpload(Request $req){
        $req->validate([
          'imageFile' => 'required',
          'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
    
        if($req->hasfile('imageFile')) {
            foreach($req->file('imageFile') as $file)
            {
                $student=Admission::find($req->input('student_id'));
                $name = $file->getClientOriginalName();
                $ext = strtolower($file->getClientOriginalExtension()); // You can use also getClientOriginalName()
                $image_full_name = $student->name.'-'.$req->input('image_field').'.'.$ext;
       
                $image_path=public_path().'/studnts/'. $image_full_name;
                // remove old image
                if(file_exists($image_path)) {
                  unlink($image_path);
                }
    
                // imge upload

                $file->move(public_path().'/students/', $image_full_name);  
                // image url
                
        
                //save in user table
                $student[$req->input('image_field')] = $image_full_name;
                $student->save();
            }
    
           return back()->with('success', 'File has successfully uploaded!');
        }
      }

}
