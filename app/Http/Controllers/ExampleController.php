<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\vueform;
class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forms=vueform::where('active_status','1')->get();
        return Inertia::render('viewform',['forms'=> $forms]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('exampleTwo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'course'=>'required',
            'gender'=>'required',
        ]);

        $form=vueform::create(
            $request->all()
        );
       return Inertia::render('exampleTwo',['msg'=>'Inserted Successfully']);

        // $form=new vueform();
        // $form->name=$request->name;
        // $form->email=$request->email;
        // $form->course=$request->course;
        // $form->gender=$request->gender;
        // $form->save();
        // return response()->json([
        //     'message'=>'inserted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
        $data=vueform::find($id);
        return Inertia::render('editpage',['data'=>$data]);

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
        //
        $data=vueform::where('id',$id)->first();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->course=$request->course;
        $data->gender=$request->gender;
        $data->save();
        return Inertia::render('editpage',['data'=>$data,'msg'=>'Updated Successfully']);
       // return redirect()->back()->with('msg','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data=vueform::find($id);
        $data->active_status="0";
        $data->delete_status="1";
        $data->save();
        // $data->delete();
        $forms=vueform::where('active_status','1')->get();
        return Inertia::render('viewform',['forms'=> $forms,'msg'=>'Deleted Successfully']);  

     }

}
