<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Admissionfee;
use App\Models\Talimat\Classes;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class AdmissionfeeController extends Controller
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
        
        $datas = Admissionfee::orderBy('id','DESC')->paginate(10);
        return view('talimat.admissionfees.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c_id=Session::get('c_id')+1;
        
        $classes = Classes::pluck('name', 'id');
        $datas = Admissionfee::get();
        return view('talimat.admissionfees.create',compact('datas','classes','c_id'));
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
            'admissionfee' => 'integer|min:99|max:2500',
            'classes_id' => 'required',
        ]);
    
        $admissionfees = Admissionfee::create([
            'admissionfee' => $request->input('admissionfee'),
            'classes_id' => $request->input('classes_id'),
            'user_id' => auth()->user()->id
            ]);
        
        Session::put('c_id', $request->input('classes_id'));
        
        return redirect()->route('admissionfees.index')
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
        $data = Admissionfee::find($id);
        return view('talimat.admissionfees.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admissionfee = Admissionfee::find($id);
        $classes = Classes::pluck('name', 'id');
        return view('talimat.admissionfees.edit',compact('admissionfee','classes'));
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
            'admissionfee' => 'integer|min:99|max:2500',
            'classes_id' => 'required',
        ]);
    
        $admissionfees = Admissionfee::find($id);
        $admissionfees->admissionfee = $request->input('admissionfee');
        $admissionfees->classes_id = $request->input('classes_id');
        $admissionfees->save();
    
        return redirect()->route('admissionfees.index')
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
        DB::table("admissionfee")->where('id',$id)->delete();
        return redirect()->route('admissionfees.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Admissionfee::find($id);

        return view('talimat.admissionfees.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Admissionfee::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.admissionfees.report', compact('data', 'datas','i'));
    }
}
