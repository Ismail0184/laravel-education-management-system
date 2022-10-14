<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Monthlyfee;
use App\Models\Talimat\Classes;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class MonthlyfeeController extends Controller
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
        
        $datas = Monthlyfee::orderBy('id','DESC')->paginate(10);
        return view('talimat.monthlyfees.index',compact('datas','banglans'))
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
        $datas = Monthlyfee::get();
        $selectedID =0;
        return view('talimat.monthlyfees.create',compact('datas','classes','selectedID'));
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
            'monthlyfee' => 'required|integer',
            'classes_id' => 'required',
        ]);
    
        $monthlyfees = Monthlyfee::create([
            'monthlyfee' => $request->input('monthlyfee'),
            'classes_id' => $request->input('classes_id'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('monthlyfees.index')
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
        $data = Monthlyfee::find($id);
        return view('talimat.monthlyfees.show',compact('data'));
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
        $data = Monthlyfee::find($id);
        return view('talimat.monthlyfees.edit',compact('data','classes'));
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
            'monthlyfee' => 'required|integer',
            'classes_id' => 'required',
        ]);
    
        $monthlyfees = Monthlyfee::find($id);
        $monthlyfees->monthlyfee = $request->input('monthlyfee');
        $monthlyfees->save();
    
        return redirect()->route('monthlyfees.index')
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
        DB::table("monthlyfee")->where('id',$id)->delete();
        return redirect()->route('monthlyfees.index')
                        ->with('success', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Monthlyfee::find($id);

        return view('talimat.monthlyfees.delete', compact('data'));
    }
    
    public function report() {
        $data = Madrasha::find(1);
        $datas = Monthlyfee::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.monthlyfees.report', compact('data', 'datas','i'));
    }
}
