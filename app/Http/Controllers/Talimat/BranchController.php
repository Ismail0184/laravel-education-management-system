<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Branch;
use App\Models\Talimat\Classes;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class BranchController extends Controller
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
        
        $datas = Branch::orderBy('id','DESC')->paginate(10);
        return view('talimat.branches.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Branch::get();
        $classes = Classes::pluck('name', 'id');
        return view('talimat.branches.create',compact('datas','classes'));
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
            'classes_id' => 'required',
        ]);
    
        $branches = Branch::create([
            'name' => $request->input('name'), 
            'classes_id' => $request->input('classes_id'), 
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('branches.index')
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
        $data = Branch::find($id);
        return view('talimat.branches.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Branch::find($id);
        $classes = Classes::pluck('name', 'id');
        return view('talimat.branches.edit',compact('data', 'classes'));
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
            'classes_id' => 'required',
        ]);
    
        $branches = Branch::find($id);
        $branches->name = $request->input('name');
        $branches->classes_id = $request->input('classes_id');
        $branches->save();
    
        return redirect()->route('branches.index')
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
        DB::table("branch")->where('id',$id)->delete();
        return redirect()->route('branches.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    
    public function delete($id)
    {
        $data = Branch::find($id);

        return view('talimat.branches.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Branch::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.branches.report', compact('data', 'datas','i'));
    }
}
