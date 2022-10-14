<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Status;
use App\Models\Talimat\Classes;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class StatusController extends Controller
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
        
        $datas = Status::orderBy('id','DESC')->paginate(10);
        return view('talimat.statuses.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c_id=Session::get('c_id');

        $classes = Classes::pluck('name', 'id');
        $datas = Status::get();
        return view('talimat.statuses.create',compact('datas','classes','c_id'));
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
    
        $statuses = Status::create([
            'name' => $request->input('name'),
            'mark' => $request->input('mark'),
            'classes_id' => $request->input('classes_id'),
            'user_id' => auth()->user()->id
            ]);
        Session::put('c_id', $request->input('classes_id'));
    
        return redirect()->route('statuses.index')
            ->with('success',trans('lang.createdsuccessfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Status::find($id);
        return view('statuses.show',compact('data'));
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
        $data = Status::find($id);
        return view('talimat.statuses.edit',compact('data','classes'));
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
    
        $statuses = Status::find($id);
        $statuses->name = $request->input('name');
        $statuses->mark = $request->input('mark');
        $statuses->classes_id = $request->input('classes_id');
        $statuses->save();
    
        return redirect()->route('statuses.index')
                        ->with('success',trans('lang.updatedsuccessfully'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("status")->where('id',$id)->delete();
        return redirect()->route('statuses.index')
                        ->with('success',trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Status::find($id);

        return view('talimat.statuses.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        $data = Madrasha::find(1);
        $datas = Status::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.statuses.report', compact('data', 'datas','i','banglans'));
    }
}
