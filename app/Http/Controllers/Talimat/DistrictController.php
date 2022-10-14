<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\District;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Mpdf\Config\ConfigVariables; 
use DB;
use PDF;
use Session;

class DistrictController extends Controller
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
        
        if (Session::get('division') !== null ){
            $division=Session::get('division');
            $datas = District::where('division', $division)->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = District::orderBy('id','DESC')->paginate(10);
        }

        return view('talimat.districts.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = District::get();
        return view('talimat.districts.create',compact('datas'));
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
            'division' => 'required',
        ]);
    
        $districts = District::create([
            'name' => $request->input('name'),
            'division' => $request->input('division'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('districts.index')
            ->with('success','District created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = District::find($id);
        return view('talimat.districts.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = District::find($id);
        return view('talimat.districts.edit',compact('districts'));
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
            'division' => 'required',
        ]);
    
        $districts = District::find($id);
        $districts->name = $request->input('name');
        $districts->division = $request->input('division');
        $districts->save();
    
        return redirect()->route('districts.index')
                        ->with('success','District updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("district")->where('id',$id)->delete();
        return redirect()->route('districts.index')
                        ->with('warning','District deleted successfully');
    }

    public function delete($id)
    {
        $data = District::find($id);

        return view('talimat.districts.delete', compact('data'));
    }

    public function generatePDF() {
        
            $data = Madrasha::find(1);
    
            $pdf = PDF::loadView('talimat.districts.preview', compact('data'));
            return $pdf->stream('document.pdf');
        }

        public function report() {
            $banglans = Bnumber::pluck('name', 'id');
            $data = Madrasha::find(1);
            if (Session::get('division') !== null ){
                $division=Session::get('division');
                $datas = District::where('division', $division)->orderBy('id','DESC')->get(); 
            } else {
                $datas = District::orderBy('id','DESC')->get(); 
                }   
            $i=0;
            return view('talimat.districts.report', compact('data', 'datas','i','banglans'));
        }
}
