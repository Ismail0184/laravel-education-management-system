<?php

namespace App\Http\Controllers;

use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class MadrashaController extends Controller
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
        
        $datas = Madrasha::orderBy('id','DESC')->paginate(10);
        return view('talimat.madrashas.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Madrasha::get();
        return view('talimat.madrashas.create',compact('datas'));
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
    
        $madrashas = Madrasha::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('madrashas.index')
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
        $data = Madrasha::find($id);
        return view('talimat.madrashas.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $madrashas = Madrasha::find($id);
        return view('talimat.madrashas.edit',compact('madrashas'));
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
    
        $madrashas = Madrasha::find($id);
        $madrashas->name = $request->input('name');
        $madrashas->address = $request->input('address');
        $madrashas->mobile = $request->input('mobile');
        $madrashas->email = $request->input('email');
        $madrashas->website = $request->input('website');
        $madrashas->save();
    
        return redirect()->route('madrashas.index')
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
        DB::table("madrasha")->where('id',$id)->delete();
        return redirect()->route('madrashas.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Madrasha::find($id);

        return view('talimat.madrashas.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Madrasha::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.madrashas.report', compact('data', 'datas','i'));
    }
}
