<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Exambench; 
use App\Models\Talimat\Admission;
use App\Models\Talimat\Siteplan;
use App\Models\Talimat\Examname;
use App\Models\Talimat\Examholl;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Exambenchside;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class SiteplanController extends Controller
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
        
        $examnames = Examname::pluck('name', 'id');
        $examholls = Examholl::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');

        $datas = Siteplan::orderBy('id','DESC')->paginate(5);
        return view('talimat.siteplans.index',compact('datas','banglans','examholls','examnames','classes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exambenches = Exambench::pluck('name', 'id');
        $admissions = Admission::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');
        $exambenchsides = Exambenchside::pluck('name', 'id');
        $datas = Siteplan::get();
    
        $eb_id=Session::get('eb_id');
        $e_id=Session::get('e_id');
        $ebs_id=Session::get('ebs_id');


        return view('talimat.siteplans.create',compact('datas','exambenches','examnames','admissions','exambenchsides', 'eb_id','e_id', 'ebs_id'));
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
            'admission_id' => 'required',
            'exambench_id' => 'required',
            'examname_id' => 'required',
            'exambenchside_id' => 'required',
        ]);
    
        $siteplans = Siteplan::create([
            'admission_id' => $request->input('admission_id'),
            'exambench_id' => $request->input('exambench_id'),
            'exambenchside_id' => $request->input('exambenchside_id'),
            'examname_id' => $request->input('examname_id'),
            'user_id' => auth()->user()->id
            ]);
        
        // update exambench 
        $exambenches = Exambench::find($request->input('exambench_id'));
        $student = Admission::find($request->input('admission_id'));
        if ($request->input('exambenchside_id') ==1)
            {
                $exambenches->c1 = $banglans[$student->id] . ' - [' . $student->classes->name .']';
            } 
        elseif ($request->input('exambenchside_id') ==3)
            {
                $exambenches->c3 = $banglans[$student->id] . ' - [' . $student->classes->name .']';
            }
        $exambenches->save();

            Session::put('eb_id', $request->input('exambench_id')+1);
            Session::put('e_id', $request->input('examname_id'));
            Session::put('ebs_id', $request->input('exambenchside_id'));
            
        return redirect()->route('siteplans.index')
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
        $data = Siteplan::find($id);
        return view('talimat.siteplans.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admissions = Admission::pluck('name', 'id');
        $exambenches = Exambench::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');
        $exambenchsides = Exambenchside::pluck('name', 'id');
        $siteplan = Siteplan::find($id);
        return view('talimat.siteplans.edit',compact('siteplan','exambenches','examnames', 'admissions', 'exambenchsides'));
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
            'admission_id' => 'required',
            'exambench_id' => 'required',
            'examname_id' => 'required',
            'exambenchside_id' => 'required',
        ]);
    
        $siteplans = Siteplan::find($id);
        $siteplans->admission_id = $request->input('admission_id');
        $siteplans->exambench_id = $request->input('exambench_id');
        $siteplans->examname_id = $request->input('examname_id');
        $siteplans->exambenchside_id = $request->input('exambenchside_id');
        $siteplans->save();

        // update exambench 
        $exambenches = Exambench::find($request->input('exambench_id'));
        $student = Admission::find($request->input('admission_id'));
        if ($request->input('exambenchside_id') ==1)
            {
                $exambenches->c1 = $banglans[$student->id] . ' - [' . $student->classes->name .']';
            } 
        elseif ($request->input('exambenchside_id') ==3)
            {
                $exambenches->c3 = $banglans[$student->id] . ' - [' . $student->classes->name .']';
            }
        $exambenches->save();

    
        return redirect()->route('siteplans.index')
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
        DB::table("siteplan")->where('id',$id)->delete();
        return redirect()->route('siteplans.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Siteplan::find($id);

        return view('talimat.siteplans.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Siteplan::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.siteplans.report', compact('data', 'datas','i'));
    }
    public function admidcard() {
        $data = Madrasha::find(1);
        $datas = Siteplan::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.siteplans.admidcard', compact('data', 'datas','i'));
    }
    public function auto(Request $request) {

        $banglans = Bnumber::pluck('name', 'id');
        
        $classes_id=$request->input('classes_id');
        $examholl_id=$request->input('examholl_id');
        $examname_id=$request->input('examname_id');
        $students = Admission::where('classes_id',$classes_id)->orderBy('id','ASC')->get();
        $exambench = Exambench::where('c1',null)->where('examholl_id',$examholl_id)->orderBy('id','DESC')->first();

        foreach($students as $key => $student) {
            $exambench = Exambench::where('c1',null)->where('examholl_id',$examholl_id)->orderBy('id','ASC')->first();
            $exambenchside_id=1;
            if ($exambench == null){
                $exambench = Exambench::where('c3',null)->where('examholl_id',$examholl_id)->orderBy('id','ASC')->first();
                $exambenchside_id=3;
            }

            $siteplans = Siteplan::create([
                'admission_id' => $student->id,
                'exambench_id' => $exambench->id,
                'exambenchside_id' => $exambenchside_id,
                'examname_id' => $request->input('examname_id'),
                'user_id' => auth()->user()->id
                ]);            
            
        // update exambenches table    
        if ($exambenchside_id ==1)
            {
                $exambench->c1 = $banglans[$student->id] . ' - [' . $student->classes->name .']';
            } 
        elseif ($exambenchside_id ==3)
            {
                $exambench->c3 = $banglans[$student->id] . ' - [' . $student->classes->name .']';
            }
        $exambench->save();
                
        }

        return redirect()->route('siteplans.index')
                        ->with('success','auto completed');

    }
    public function adelete(Request $request) {

        $banglans = Bnumber::pluck('name', 'id');
        
        $classes_id=$request->input('classes_id');
        $examname_id=$request->input('examname_id');
        $students = Admission::where('classes_id',$classes_id)->orderBy('id','ASC')->get();

        foreach($students as $key => $student) {
            DB::table("siteplan")->where('admission_id',$student->id)->where('examname_id',$examname_id)->delete();                
            $exambenchc1 = Exambench::where('c1',$banglans[$student->id] . ' - [' . $student->classes->name .']')->where('examname_id',$examname_id)->first();
            if ($exambenchc1 !== null){
                $exambenchc1->c1=null;
                $exambenchc1->save();
            }
            $exambenchc3 = Exambench::where('c3',$banglans[$student->id] . ' - [' . $student->classes->name .']')->where('examname_id',$examname_id)->first();
            if ($exambenchc3 !== null){
                $exambenchc3->c3=null;
                $exambenchc3->save();
            }
        }

        return redirect()->route('siteplans.index')
                        ->with('success','auto deleted');

    }
}
