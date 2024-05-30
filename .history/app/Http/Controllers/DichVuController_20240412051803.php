<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DichVus;

class DichVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DichVus::all();
        return view('dichvu.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dichvu.create');
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
            'tenDichVu'=>'required',
            'donGia'=>'required',
            'moTa'=>'required',
        ]);
        $data = new DichVus;
        $data ->tenDichVu=$request->tenDichVu;
        $data ->donGia=$request->donGia;
        $data ->moTa=$request->moTa;
        $data ->save();
        
        return redirect('admin/dichvu/create')->with('success','Dữ liệu đã được thêm vào.');
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
        $data=DichVus::find($id);
        return view('dichvu.show',['data'=>$data]);
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
        $data=LoaiPhongs::find($id);
        return view('loaiphong.edit',['data'=>$data]);
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
        $data = LoaiPhongs::find($id);
        $data ->tenLoaiPhong=$request->tenLoaiPhong;
        $data ->donGia=$request->donGia;
        $data ->moTa=$request->moTa;
        $data ->save();

        return redirect('admin/loaiphong/'.$id.'/edit')->with('success','Dữ liệu đã được cập nhật.');
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
        LoaiPhongs::where('id', $id)->delete();
        return redirect('admin/loaiphong/')->with('success','Dữ liệu đã được xóa.');
    }
}
