<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Subject;
use App\Models\Talimat\Classes;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;
class SubjectController extends Controller
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
        
        if (Session::get('c_id') !== null){
            $classes_id=Session::get('c_id'); 
            $datas = Subject::where('classes_id', $classes_id )->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Subject::orderBy('id','DESC')->paginate(10);
        }
        return view('talimat.subjects.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::pluck('name', 'id');
        $datas = Subject::get();
        $selectedID =0;
        return view('talimat.subjects.create',compact('datas','classes','selectedID'));
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
            'total_mark' => 'required|integer',
            'fail_mark' => 'required|integer',
            'classes_id' => 'required',
        ]);
    
        $subjects = Subject::create([
            'name' => $request->input('name'),
            'total_mark' => $request->input('total_mark'),
            'fail_mark' => $request->input('fail_mark'),
            'grace_mark' => $request->input('grace_mark'),
            'classes_id' => $request->input('classes_id'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('subjects.index')
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
        $data = Subject::find($id);
        return view('talimat.subjects.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        $classes = Classes::pluck('name', 'id');
        return view('talimat.subjects.edit',compact('subject', 'classes'));
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
            'name' => 'required|max:100',
            'total_mark' => 'required|integer',
            'fail_mark' => 'required|integer',
            'classes_id' => 'required',
        ]);
    
        $subjects = Subject::find($id);
        $subjects->name = $request->input('name');
        $subjects->total_mark = $request->input('total_mark');
        $subjects->fail_mark = $request->input('fail_mark');
        $subjects->grace_mark = $request->input('grace_mark');
        $subjects->classes_id = $request->input('classes_id');
        $subjects->save();
    
        return redirect()->route('subjects.index')
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
        DB::table("subject")->where('id',$id)->delete();
        return redirect()->route('subjects.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    
    public function delete($id)
    {
        $data = Subject::find($id);

        return view('talimat.subjects.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        if (Session::get('c_id') !== null){
            $classes_id=Session::get('c_id');
                $datas = Subject::where('classes_id', $classes_id )->orderBy('id','DESC')->get();    
        } else {
            $datas = Subject::orderBy('id','DESC')->get();
        }
        $i=0;
        return view('talimat.subjects.report', compact('data', 'datas','i'));
    }
}
