<?php

namespace App\Http\Controllers\Talimat;

use App\Http\Controllers\Controller;
use App\Models\Talimat\Room;
use App\Models\Talimat\Branch;
use App\Models\Talimat\Classes;
use App\Models\Talimat\Building;
use App\Models\Talimat\Teacher;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use DB;

class RoomController extends Controller
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
        
        $datas = Room::orderBy('id','DESC')->paginate(10);
        return view('talimat.rooms.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        
        $datas = Room::get();
        return view('talimat.rooms.create',compact('datas','buildings','classes','branches','teachers'));
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
            'building_id' => 'required',
        ]);
    
        $rooms = Room::create([
            'name' => $request->input('name'),
            'building_id' => $request->input('building_id'),
            'branch_id' => $request->input('branch_id'),
            'classes_id' => $request->input('classes_id'),
            'teacher_id' => $request->input('teacher_id'),
            'user_id' => auth()->user()->id
            ]);
            
        return redirect()->route('rooms.index')
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
        $data = Room::find($id);
        return view('talimat.rooms.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $buildings = Building::pluck('name', 'id');
        $classes = Classes::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        
        return view('talimat.rooms.edit',compact('room', 'buildings','classes','branches','teachers'));
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
            'building_id' => 'required',
      ]);
    
        $rooms = Room::find($id);
        $rooms->name = $request->input('name');
        $rooms->building_id = $request->input('building_id');
        $rooms->branch_id = $request->input('branch_id');
        $rooms->classes_id = $request->input('classes_id');
        $rooms->teacher_id = $request->input('teacher_id');
        $rooms->save();
    
        return redirect()->route('rooms.index')
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
        DB::table("room")->where('id',$id)->delete();
        return redirect()->route('rooms.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }

    public function delete($id)
    {
        $data = Room::find($id);

        return view('talimat.rooms.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Room::orderBy('id','DESC')->get();    
        $i=0;
        return view('talimat.rooms.report', compact('data', 'datas','i'));
    }
}
