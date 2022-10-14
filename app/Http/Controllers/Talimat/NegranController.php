<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Negran;
use App\Models\Talimat\Teacher;
use App\Models\Talimat\classes;
use App\Models\Talimat\Branch;
use App\Models\Talimat\Room;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class NegranController extends Controller
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
        
        $datas = Negran::orderBy('id','DESC')->paginate(5);
        return view('talimat.negrans.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $rooms = Room::pluck('name', 'id');
        $datas = Negran::get();
        $selectedID =0;
        return view('talimat.negrans.create',compact('datas','teachers','classes', 'branches', 'rooms'));
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
            'teacher_id' => 'required',
            'classes_id' => 'required',
            'branch_id' => 'required',
            'room_id' => 'required',
        ]);
    
        $negrans = Negran::create([
            'teacher_id' => $request->input('teacher_id'),
            'classes_id' => $request->input('classes_id'),
            'branch_id' => $request->input('branch_id'),
            'room_id' => $request->input('room_id'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('negrans.index')
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
        $data = Negran::find($id);
        return view('talimat.negrans.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $rooms = Room::pluck('name', 'id');
        $negran = Negran::find($id);
        return view('talimat.negrans.edit',compact('negran','teachers','classes','branches','rooms'));
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
            'teacher_id' => 'required',
            'classes_id' => 'required',
            'branch_id' => 'required',
            'room_id' => 'required',
        ]);
    
        $negrans = Negran::find($id);
        $negrans->teacher_id = $request->input('teacher_id');
        $negrans->classes_id = $request->input('classes_id');
        $negrans->branch_id = $request->input('branch_id');
        $negrans->room_id = $request->input('room_id');
        $negrans->save();
    
        return redirect()->route('negrans.index')
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
        DB::table("negran")->where('id',$id)->delete();
        return redirect()->route('negrans.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Negran::find($id);

        return view('talimat.negrans.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Negran::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.negrans.report', compact('data', 'datas','i'));
    }
}
