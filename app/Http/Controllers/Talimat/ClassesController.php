<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Division;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class ClassesController extends Controller
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
        
        $datas = Classes::orderBy('id','DESC')->paginate(10);
        return view('talimat.classes.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Classes::get();
        $departments = Division::pluck('name', 'id');
         return view('talimat.classes.create',compact('data', 'departments'));
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
            'division_id' => 'required',
        ]);
    
        $classes = Classes::create([
            'name' => $request->input('name'),
            'total_mark' => $request->input('total_mark'),
            'mumtaj' => $request->input('mumtaj'),
            'jjiddan' => $request->input('jjiddan'),
            'jayeed' => $request->input('jayeed'),
            'mokbul' => $request->input('mokbul'),
            'division_id' => $request->input('division_id'),
            'user_id' => auth()->user()->id
            ]);
        return redirect()->route('classes.index')
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
        $data = Classes::find($id);
        return view('talimat.classes.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Division::pluck('name', 'id');
        $classes = Classes::find($id);
        return view('talimat.classes.edit',compact('classes', 'departments'));
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
            'division_id' => 'required'
        ]);
    
        $classes = Classes::find($id);
        $classes->name = $request->input('name');
        $classes->mumtaj = $request->input('mumtaj');
        $classes->jjiddan = $request->input('jjiddan');
        $classes->jayeed = $request->input('jayeed');
        $classes->mokbul = $request->input('mokbul');
        $classes->total_mark = $request->input('total_mark');
        $classes->division_id = $request->input('division_id');
        $classes->save();
    
        return redirect()->route('classes.index')
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
        DB::table("classes")->where('id',$id)->delete();
        return redirect()->route('classes.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Classes::find($id);

        return view('talimat.classes.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Classes::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.classes.report', compact('data', 'datas','i'));
    }
}
