<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Thana;
use App\Models\Talimat\District;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class ThanaController extends Controller
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
        
        if (Session::get('d_id') !== null ){
            $d_id=Session::get('d_id');
            $datas = Thana::where('district_id',$d_id)->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Thana::orderBy('id','DESC')->paginate(10);
        }        
        
        return view('talimat.thanas.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Thana::get();
        $districts = District::pluck('name', 'id');
        return view('talimat.thanas.create',compact('datas', 'districts'));
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
            'district_id' => 'required',
        ]);
    
        $thanas = Thana::create([
            'name' => $request->input('name'),
            'district_id' => $request->input('district_id'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('thanas.index')
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
        $data = Thana::find($id);
        return view('talimat.thanas.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thana = Thana::find($id);
        $districts = District::pluck('name', 'id');
        return view('talimat.thanas.edit',compact('thana', 'districts'));
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
            'district_id' => 'required',
        ]);
    
        $thanas = Thana::find($id);
        $thanas->name = $request->input('name');
        $thanas->district_id = $request->input('district_id');
        $thanas->save();
    
        return redirect()->route('thanas.index')
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
        DB::table("thana")->where('id',$id)->delete();
        return redirect()->route('thanas.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Thana::find($id);

        return view('talimat.thanas.delete', compact('data'));
    }

    public function report() {
        $banglans = Bnumber::pluck('name', 'id');        
        $data = Madrasha::find(1);
        if (Session::get('d_id') !== null ){
            $d_id=Session::get('d_id');
            $datas = Thana::where('district_id',$d_id)->orderBy('id','DESC')->get();    
        } else {
            $datas = Thana::orderBy('id','DESC')->get();    
        }
        $i=0;
        return view('talimat.thanas.report', compact('data', 'datas','i','banglans'));
    }
}
