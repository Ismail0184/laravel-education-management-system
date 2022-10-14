<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Examholl;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class ExamhollController extends Controller
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
        
        $datas = Examholl::orderBy('id','DESC')->paginate(10);
        return view('talimat.examholls.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Examholl::get();
        return view('talimat.examholls.create',compact('datas'));
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
            'bench_count' => 'required',
            'bench_row' => 'required',
        ]);
    
        $examholls = Examholl::create([
            'name' => $request->input('name'),
            'bench_count' => $request->input('bench_count'),
            'bench_row' => $request->input('bench_row'),
            'user_id' => auth()->user()->id
            
            ]);
        return redirect()->route('examholls.index')
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
        $data = Examholl::find($id);
        return view('talimat.examholls.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examholls = Examholl::find($id);
        return view('talimat.examholls.edit',compact('examholls'));
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
            'bench_count' => 'required',
            'bench_row' => 'required',
        ]);
    
        $examholls = Examholl::find($id);
        $examholls->name = $request->input('name');
        $examholls->bench_count = $request->input('bench_count');
        $examholls->bench_row = $request->input('bench_row');
        $examholls->save();
    
        return redirect()->route('examholls.index')
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
        DB::table("examholl")->where('id',$id)->delete();
        return redirect()->route('examholls.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Examholl::find($id);

        return view('talimat.examholls.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Examholl::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.examholls.report', compact('data', 'datas','i'));
    }
}
