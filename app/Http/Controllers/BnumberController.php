<?php

namespace App\Http\Controllers;

use App\Models\Bnumber;
use App\Models\Madrasha;
use Illuminate\Http\Request;
use DB;

class BnumberController extends Controller
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
        
        $datas = Bnumber::orderBy('id','ASC')->paginate(25);
        return view('talimat.bnumbers.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 25);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Bnumber::get();
        return view('talimat.bnumbers.create',compact('datas'));
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
        ]);
    
        $bnumbers = Bnumber::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('bnumbers.index')
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
        $data = Bnumber::find($id);
        return view('bnumbers.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bnumbers = Bnumber::find($id);
        return view('talimat.bnumbers.edit',compact('bnumbers'));
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
        ]);
    
        $bnumbers = Bnumber::find($id);
        $bnumbers->name = $request->input('name');
        $bnumbers->save();
    
        return redirect()->route('bnumbers.index')
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
        DB::table("bnumber")->where('id',$id)->delete();
        return redirect()->route('bnumbers.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Bnumber::find($id);

        return view('talimat.bnumbers.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Bnumber::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.bnumbers.report', compact('data', 'datas','i'));
    }
    
    public static function toBangla($value) {
        $banglans = Bnumber::pluck('name', 'id');
        
        $arr1 = str_split($value);

        $getvalue='';
        foreach($arr1 as $key => $number) {      
            // Display all alphabetic elements
            // one after another
            if (is_numeric($number)){
                $getvalue= $getvalue . $banglans[$number];
            } else {
                $getvalue= $getvalue . $number;
            }
        }
        return $getvalue;
    }

}
