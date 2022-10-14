<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Exambenchside;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class ExambenchsideController  extends Controller
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
        
        $datas = Exambenchside::orderBy('id','DESC')->paginate(10);
        return view('talimat.exambenchsides.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Exambenchside::get();
        return view('talimat.exambenchsides.create',compact('datas'));
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
    
        $exambenchsides = Exambenchside::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            
            ]);


        return redirect()->route('exambenchsides.index')
            ->with('success','Exambenchside created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Exambenchside::find($id);
        return view('talimat.exambenchsides.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exambenchsides = Exambenchside::find($id);
        return view('talimat.exambenchsides.edit',compact('exambenchsides'));
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
    
        $exambenchsides = Exambenchside::find($id);
        $exambenchsides->name = $request->input('name');
        $exambenchsides->save();
    
        return redirect()->route('exambenchsides.index')
                        ->with('success','Exambenchside updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("exambenchside")->where('id',$id)->delete();
        return redirect()->route('exambenchsides.index')
                        ->with('success','Exambenchside deleted successfully');
    }
    public function delete($id)
    {
        $data = Exambenchside::find($id);

        return view('talimat.exambenchsides.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        
        $data = Madrasha::find(1);
        $datas = Exambenchside::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.exambenchsides.report', compact('data', 'datas','i','banglans'));
    }
}
