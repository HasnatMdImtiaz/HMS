<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roomtype;
use App\Models\Room;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Room::all();
        return view('room.index',['data'=>$data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $roomtypes=Roomtype::all();
        return view('room.create',["roomtypes"=>$roomtypes]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Room;
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title;
        
        $data->save();
        return redirect("admin/rooms/create")->with('success','Your data has been added ');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Room::find($id);
        return view('room.show',['data'=>$data]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $roomtypes=Roomtype::all();
        $data=Room::find($id);
        return view('room.edit',['data'=>$data,"roomtypes"=>$roomtypes]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $data=Room::find($id);
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title;
        
        $data->save();
        // if (!$data) {
        //     return redirect()->route('room.index')->with('error', 'Room not found');
        // }
        // $data->update([
        //     'title' => $request->title,
        //     'detail' => $request->detail,
        // ]);
        
        return redirect()->back()->with('success','Your data has been updated ');
        // return back()->with('success','Your data has been updated ');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   Room::where('id',$id)->delete();
        return redirect('admin/rooms')->with('success','Your data has been deleted ');

        //
    }
}
