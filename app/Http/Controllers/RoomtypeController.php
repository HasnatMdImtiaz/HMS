<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roomtype;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Storage;
class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Roomtype::all();
        return view('roomtype.index',['data'=>$data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
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
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required'

        ]);

        $data= new Roomtype;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();
        foreach($request->file('imgs') as $img){
            $imgPath=$img->store('public/img');
            $imgData=new Roomtypeimage;
            $imgData->room_type_id=$data->id;
            $imgData->img_src=str_replace('public/',"",$imgPath);
            $imgData->img_alt=$request->title;
            $imgData->save();

        }
        return redirect("admin/roomtype/create")->with('success','Your data has been added ');
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
        $data=Roomtype::find($id);
        return view('roomtype.show',['data'=>$data]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $data=Roomtype::find($id);
        return view('roomtype.edit',['data'=>$data]);
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
    {  $request->validate([
        'title'=>'required',
        'price'=>'required',
        'detail'=>'required'

    ]);

    $data= Roomtype::find($id);
    $data->title=$request->title;
    $data->price=$request->price;
    $data->detail=$request->detail;
    $data->save();
    if($request->hasFile('imgs')){
        foreach($request->file('imgs') as $img){
            $imgPath=$img->store('public/img');
            $imgData= new Roomtypeimage;
            $imgData->room_type_id=$data->id;
            $imgData->img_src=str_replace('public/',"",$imgPath);
            $imgData->img_alt=$request->title;
            $imgData->save();
    
        }
    }
    
        
        
        
        
        // $data=Roomtype::find($id);
        // $data->title=$request->title;
        // $data->price=$request->price;
        // $data->detail=$request->detail;
        // $data->save();
 
        
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
    {   Roomtype::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','Your data has been deleted ');

        //
    }

    public function destroy_image($img_id)
    {   $data=Roomtypeimage::where('id',$img_id)->delete();
        Storage::delete($data->img_src);
        return response()->json(['bool'=>true]);

        //
    }

}
