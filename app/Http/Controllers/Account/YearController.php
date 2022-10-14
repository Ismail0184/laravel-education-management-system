<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Year;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class YearController extends Controller
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
        
        $datas = Year::orderBy('id','DESC')->paginate(10);
        return view('account.years.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Year::get();
        return view('account.years.create',compact('datas'));
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
            'year' => 'required|integer',
        ]);
    
        $years = Year::create([
            'year' => $request->input('year'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('years.index')
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
        $data = Year::find($id);
        return view('years.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $years = Year::find($id);
        return view('account.years.edit',compact('years'));
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
            'year' => 'required|integer',
        ]);
    
        $years = Year::find($id);
        $years->year = $request->input('year');
        $years->save();
    
        return redirect()->route('years.index')
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
        DB::table("year")->where('id',$id)->delete();
        return redirect()->route('years.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function delete($id)
    {
        $data = Year::find($id);

        return view('account.years.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Year::orderBy('id','DESC')->get();    
        $i=0;
        return view('account.years.report', compact('data', 'datas','i'));
    }
}
