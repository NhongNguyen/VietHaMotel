<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoiQuys;

class NoiQuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = NoiQuys::all();
        return view('noiquy.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('noiquy.create');
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
        $request->validate([
            'tenNoiQuy'=>'required',
            'moTa'=>'required',
        ]);
        $data = new NoiQuys;
        $data ->tenNoiQuy=$request->tenNoiQuy;
        $data ->donGia=$request->donGia;
        $data ->moTa=$request->moTa;
        $data ->save();
        
        return redirect('admin/noiquy/create')->with('success','Dữ liệu đã được thêm vào.');
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
        $data=NoiQuys::find($id);
        return view('noiquy.show',['data'=>$data]);
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
        $data=NoiQuys::find($id);
        return view('noiquy.edit',['data'=>$data]);
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
        $data = NoiQuys::find($id);
        $data ->tenNoiQuy=$request->tenNoiQuy;
        $data ->donGia=$request->donGia;
        $data ->moTa=$request->moTa;
        $data ->save();

        return redirect('admin/noiquy/'.$id.'/edit')->with('success','Dữ liệu đã được cập nhật.');
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
        NoiQuys::where('id', $id)->delete();
        return redirect('admin/noiquy/')->with('success','Dữ liệu đã được xóa.');
    }
}
