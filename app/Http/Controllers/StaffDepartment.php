<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class StaffDepartment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Department::all();
        return view('department.index',['data'=>$data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('department.create');
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
        $data= new Department;
    
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        return redirect("admin/department/create")->with('success','Your data has been added ');
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
        $data=Department::find($id);
        return view('department.show',['data'=>$data]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=Department::find($id);
        return view('department.edit',['data'=>$data]);
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
    {   $data=Department::find($id);
        $data->title=$request->title;
        $data->detail=$request->detail;
        $data->save();
        // if (!$data) {
        //     return redirect()->route('Department.index')->with('error', 'Department not found');
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
    {   Department::where('id',$id)->delete();
        return redirect('admin/department')->with('success','Your data has been deleted ');

        //
    }
}
