<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Setting;
use App\Models\Talimat\Classes;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;
use Session;

class SettingController extends Controller
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
        
        $datas = Setting::orderBy('id','DESC')->paginate(5);
        return view('talimat.settings.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::pluck('name', 'id');
        $datas = Setting::get();
        $selectedID =0;
        return view('talimat.settings.create',compact('datas','classes','selectedID'));
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
            'setting' => 'required',
        ]);
    
        $settings = Setting::create([
            'name' => $request->input('name'),
            'setting' => $request->input('setting'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('settings.index')
            ->with('success','Setting created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Setting::find($id);
        return view('talimat.settings.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::find($id);
        return view('talimat.settings.edit',compact('settings'));
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
            'setting' => 'required',
        ]);
    

        $settings = Setting::find($id);
        $settings->name = $request->input('name');
        $settings->settinh = $request->input('setting');
        $settings->save();
    
        return redirect()->route('settings.index')
                        ->with('success','Setting updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("setting")->where('id',$id)->delete();
        return redirect()->route('settings.index')
                        ->with('success','Setting deleted successfully');
    }
    
    public function delete($id)
    {
        $data = Setting::find($id);

        return view('talimat.settings.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Setting::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.settings.report', compact('data', 'datas','i'));
    }
}
