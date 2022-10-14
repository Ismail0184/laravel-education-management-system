<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Examname;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class ExamnameController extends Controller
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
        
        $datas = Examname::orderBy('id','DESC')->paginate(5);
        return view('talimat.examnames.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Examname::get();
        return view('talimat.examnames.create',compact('datas'));
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
    
        $examnames = Examname::create([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('examnames.index')
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
        $data = Examname::find($id);
        return view('talimat.examnames.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examnames = Examname::find($id);
        return view('talimat.examnames.edit',compact('examnames'));
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
    
        $examnames = Examname::find($id);
        $examnames->name = $request->input('name');
        $examnames->save();
    
        return redirect()->route('examnames.index')
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
        DB::table("examname")->where('id',$id)->delete();
        return redirect()->route('examnames.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Examname::find($id);

        return view('talimat.examnames.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        
        $data = Madrasha::find(1);
        $datas = Examname::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.examnames.report', compact('data', 'datas','i','banglans'));
    }
}
