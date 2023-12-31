<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required'
            
        ]);


        $imgPath=$request->file('photo')->store('public/img');
        $data= new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=md5($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        // $data->photo=$imgPath;
        $data->photo=str_replace('public/',"",$imgPath);
        $data->save();
        return redirect("admin/customer/create")->with('success','Your data has been added ');
        //20:15
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $data=Customer::find($id);
        return view('customer.edit',['data'=>$data]);
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
    {    $request->validate([
        'full_name'=>'required',
        'email'=>'required|email',
        'mobile'=>'required'
        
        ]);

        if ($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/img');
        }else{
            $imgPath=$request->prev_photo;
        }
        
        $data= Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=md5($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        // $data->photo=$imgPath;
        $data->photo=str_replace('public/',"",$imgPath);
        $data->save();
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
    {   Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','Your data has been deleted ');

        //
    }
}
