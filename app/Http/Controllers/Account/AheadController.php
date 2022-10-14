<?php

namespace App\Http\Controllers\Account; 

use App\Http\Controllers\Controller;
use App\Models\Account\Ahead;
use App\Models\Account\Group;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class AheadController extends Controller
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
        
        $datas = Ahead::orderBy('id','DESC')->paginate(10);
        return view('account.aheads.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('name', 'id');
        $datas = Ahead::get();
        return view('account.aheads.create',compact('datas','groups'));
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
            'group_id' => 'required',
        ]);
    
        $aheads = Ahead::create([
            'name' => $request->input('name'),
            'group_id' => $request->input('group_id'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('aheads.index')
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
        $data = Ahead::find($id);
        return view('account.aheads.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ahead = Ahead::find($id);
        $groups = Group::pluck('name', 'id');
        return view('account.aheads.edit',compact('ahead','groups'));
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
            'group_id' => 'required',
        ]);
    
        $aheads = Ahead::find($id);
        $aheads->name = $request->input('name');
        $aheads->group_id = $request->input('group_id');
        $aheads->save();
    
        return redirect()->route('aheads.index')
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
        DB::table("ahead")->where('id',$id)->delete();
        return redirect()->route('aheads.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Ahead::find($id);

        return view('account.aheads.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Ahead::orderBy('id','DESC')->get();    
        $i=0;
        return view('account.aheads.report', compact('data', 'datas','i'));
    }
}
