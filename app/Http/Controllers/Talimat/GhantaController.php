<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Ghanta;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class GhantaController extends Controller
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
        
        $datas = Ghanta::orderBy('id','DESC')->paginate(10);
        return view('talimat.ghantas.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Ghanta::get();
        return view('talimat.ghantas.create',compact('datas'));
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
            'name' => 'required',
        ]);
    
        $ghantas = Ghanta::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('ghantas.index')
            ->with('success','Ghanta created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ghanta::find($id);
        return view('talimat.ghantas.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ghantas = Ghanta::find($id);
        return view('talimat.ghantas.edit',compact('ghantas'));
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
    
        $ghantas = Ghanta::find($id);
        $ghantas->name = $request->input('name');
        $ghantas->save();
    
        return redirect()->route('ghantas.index')
                        ->with('success','Ghanta updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("ghanta")->where('id',$id)->delete();
        return redirect()->route('ghantas.index')
                        ->with('warning','Ghanta deleted successfully');
    }
    public function delete($id)
    {
        $data = Ghanta::find($id);

        return view('talimat.ghantas.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Ghanta::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.ghantas.report', compact('data', 'datas','i'));
    }
}
