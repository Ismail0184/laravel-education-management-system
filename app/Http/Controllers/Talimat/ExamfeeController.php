<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Examfee;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Examname;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class ExamfeeController extends Controller
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
        
        $datas = Examfee::orderBy('id','DESC')->paginate(10);
        return view('talimat.examfees.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $e_id=Session::get('e_id');
        $c_id=Session::get('c_id')+1;

        $classes = Classes::pluck('name', 'id');
        $examname = Examname::pluck('name', 'id');
        $datas = Examfee::get();
        return view('talimat.examfees.create',compact('datas','classes','examname','e_id','c_id'));
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
            'examfee' => 'required|integer',
            'classes_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $examfees = Examfee::create([
            'examfee' => $request->input('examfee'),
            'classes_id' => $request->input('classes_id'),
            'examname_id' => $request->input('examname_id'),
            'user_id' => auth()->user()->id
            ]);
        
        Session::put('e_id', $request->input('examname_id'));
        Session::put('c_id', $request->input('classes_id'));

        return redirect()->route('examfees.index')
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
        $data = Examfee::find($id);
        return view('talimat.examfees.show',compact('data'));
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
        $examname = Examname::pluck('name', 'id');
        $data = Examfee::find($id);
        return view('talimat.examfees.edit',compact('data', 'classes', 'examname'));
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
            'examfee' => 'required', 
            'classes_id' => 'required',
            'examname_id' => 'required',
        ]);
    
        $examfees = Examfee::find($id);
        $examfees->examfee = $request->input('examfee');
        $examfees->classes_id = $request->input('classes_id');
        $examfees->examname_id = $request->input('examname_id');
        $examfees->save();
    
        return redirect()->route('examfees.index')
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
        DB::table("examfee")->where('id',$id)->delete();
        return redirect()->route('examfees.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Examfee::find($id);

        return view('talimat.examfees.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Examfee::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.examfees.report', compact('data', 'datas','i'));
    }
}
