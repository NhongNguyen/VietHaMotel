<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinhAnhPhongTros;
use App\Models\PhongTros;

class HinhAnhPhongTroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=HinhAnhPhongTros::all();
        $phongtros = PhongTros::all();
        return view('hinhanhphongtro.index',['data'=>$data,'phongtros'=>$phongtros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hinhanhphongtro.create');
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
            'id_phong_tro' => 'required',
            'srcHinhAnh' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'altHinhAnh' => 'required',
        ]);

        // Handle file uploads for anh dai dien
        if ($request->hasFile('srcHinhAnh')) {
            $srcHinhAnhPath = $request->file('srcHinhAnh')->store('srcHinhAnh', 'public');
        }

        $data = new HinhAnhPhongTros;
        $data->id_phong_tro = $request->id_phong_tro;
        $data->srcHinhAnh = $srcHinhAnhPath;
        $data->altHinhAnh = $request->altHinhAnh;
        $data->save();


        return redirect('admin/hinhanhphongtro/create')->with('success', 'Dữ liệu đã được thêm vào.');
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=HinhAnhPhongTros::find($id);
        return view('hinhanhphongtro.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=HinhAnhPhongTros::find($id);
        return view('hinhanhphongtro.edit',['data'=>$data]);
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
        $request->validate([ 
            'srcHinhAnh' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'altHinhAnh' => 'required',
        ]);
        // Handle file uploads for anh dai dien
        if ($request->hasFile('srcHinhAnh')) {
            $srcHinhAnhPath = $request->file('srcHinhAnh')->store('srcHinhAnh', 'public');
        }

        $data=HinhAnhPhongTros::find($id);
        $data->srcHinhAnh = $srcHinhAnhPath;
        $data->altHinhAnh = $request->altHinhAnh;
        $data->save();

        return redirect('admin/hinhanhphongtro/'.$id.'/edit')->with('success','Dữ liệu đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       HinhAnhPhongTros::where('id',$id)->delete();
       return redirect('admin/hinhanhphongtro')->with('success','Dữ liệu đã được xóa.');
    }
}