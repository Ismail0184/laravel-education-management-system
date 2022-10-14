<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Group;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class GroupController extends Controller
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
        
        $datas = Group::orderBy('id','DESC')->paginate(10);
        return view('account.groups.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Group::get();
        return view('account.groups.create',compact('datas'));
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
    
        $groups = Group::create([
            'name' => $request->input('name'),
            'maingroup' => $request->input('maingroup'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('groups.index')
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
        $data = Group::find($id);
        return view('account.groups.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::find($id);
        return view('account.groups.edit',compact('groups'));
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
    
        $groups = Group::find($id);
        $groups->name = $request->input('name');
        $groups->maingroup = $request->input('maingroup');
        $groups->save();
    
        return redirect()->route('groups.index')
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
        DB::table("group")->where('id',$id)->delete();
        return redirect()->route('groups.index')
                        ->with('warning',trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Group::find($id);

        return view('account.groups.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Group::orderBy('id','DESC')->get();    
        $i=0;
        return view('account.groups.report', compact('data', 'datas','i'));
    }
}
