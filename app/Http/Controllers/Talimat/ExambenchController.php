<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Exambench;
use App\Models\Talimat\Examholl;
use App\Models\Talimat\Examname;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;
class ExambenchController extends Controller
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
        
        $examholls = Examholl::pluck('name', 'id');
        $examnames = Examname::pluck('name', 'id');
        
        $datas = Exambench::orderBy('id','ASC')->paginate(20);
        return view('talimat.exambenches.index',compact('datas','examholls','examnames','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $e_id=Session::get('e_id');
        $eh_id=Session::get('eh_id');
        
        $examholls = Examholl::pluck('name', 'id');
        $examname = Examname::pluck('name', 'id');
        $datas = Exambench::get();
        $selectedID =0;
        return view('talimat.exambenches.create',compact('datas','examholls','examname','e_id','eh_id'));
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
            'name' => 'required|max:100',
            'bench_row' => 'required',
            'examholl_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $exambenches = Exambench::create([
            'name' => $request->input('name'),
            'bench_row' => $request->input('bench_row'),
            'c1' => $request->input('c1'),
            'c2' => $request->input('c2'),
            'c3' => $request->input('c3'),
            'examholl_id' => $request->input('examholl_id'),
            'examname_id' => $request->input('examname_id'),
            'user_id' => auth()->user()->id
            ]);
            
        Session::put('e_id', $request->input('examname_id'));            
        Session::put('eh_id', $request->input('examholl_id'));            

        return redirect()->route('exambenches.index')
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
        $data = Exambench::find($id);
        return view('talimat.exambenches.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examholls = Examholl::pluck('name', 'id');
        $examname = Examname::pluck('name', 'id');
        $exambench = Exambench::find($id);
        return view('talimat.exambenches.edit',compact('exambench','examholls','examname'));
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
            'bench_row' => 'required',
            'examholl_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $exambenches = Exambench::find($id);
        $exambenches->name = $request->input('name');
        $exambenches->bench_row = $request->input('bench_row');
        $exambenches->c1 = $request->input('c1');
        $exambenches->c2 = $request->input('c2');
        $exambenches->c3 = $request->input('c3');
        $exambenches->examholl_id = $request->input('examholl_id');
        $exambenches->examname_id = $request->input('examname_id');
        $exambenches->save();
    
        return redirect()->route('exambenches.index')
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
        DB::table("exambench")->where('id',$id)->delete();
        return redirect()->route('exambenches.index')
                        ->with('warning',trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Exambench::find($id);

        return view('talimat.exambenches.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');
        
        $data = Madrasha::find(1);
        $datas = Exambench::orderBy('id','ASC')->get();    
        $i=0;
        return view('talimat.exambenches.report', compact('data', 'datas','i','banglans'));
    }
    public function lebel() {
        $banglans = Bnumber::pluck('name', 'id');
        
        $data = Madrasha::find(1);
        $datas = Exambench::orderBy('id','ASC')->get();    
        $i=0;
        return view('talimat.exambenches.lebel', compact('data', 'datas','i','banglans'));
    }
    public function auto(Request $request) {

        $banglans = Bnumber::pluck('name', 'id');
        
        $examholl_id=$request->input('examholl_id');
        $examname_id=$request->input('examname_id');
        $examholl = Examholl::find($examholl_id);
   
        for($i=1; $i < $examholl->bench_count+1 ; $i++) {
            $exambenches = Exambench::create([
                'name' => "বেঞ্চ-" . $banglans[$i],
                'bench_row' => $examholl->bench_row,
                'examholl_id' => $request->input('examholl_id'),
                'examname_id' => $request->input('examname_id'),
                'user_id' => auth()->user()->id
                ]);
                        
            
        }

        return redirect()->route('exambenches.index')
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
