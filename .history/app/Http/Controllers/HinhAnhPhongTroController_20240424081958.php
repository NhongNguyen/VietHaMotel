<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinhAnhPhongTros;

class HinhAnhPhongTroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hinhAnhs=HinhAnhPhongTros::all();
        
        return view('hinhanhphongtro.index',['data'=>$data]);
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
            'hoKhach' => 'required',
            'tenKhach' => 'required',
            'ngaySinh' => 'required',
            'queQuan' => 'required',
            'noiThuongTru' => 'required',
            'soCCCD' => 'required',
            'ngayCap' => 'required',
            'noiCap' => 'required',
            'gioiTinh' => 'required',
            'SDT' => 'required',
            'matKhau' => 'required',
            'CCCDtruoc' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'CCCDsau' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'anhDaiDien' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Handle file uploads for CCCD truoc
        if ($request->hasFile('CCCDtruoc')) {
            $cccdTruocPath = $request->file('CCCDtruoc')->store('cccdtruoc', 'public');
        }

        // Handle file uploads for CCCD sau
        if ($request->hasFile('CCCDsau')) {
            $cccdSauPath = $request->file('CCCDsau')->store('cccdsau', 'public');
        }

        // Handle file uploads for anh dai dien
        if ($request->hasFile('anhDaiDien')) {
            $anhDaiDienPath = $request->file('anhDaiDien')->store('anhdaidien', 'public');
        }

        $data = new HinhAnhPhongTros;
        $data->hoKhach = $request->hoKhach;
        $data->tenKhach = $request->tenKhach;
        $data->ngaySinh = $request->ngaySinh;
        $data->queQuan = $request->queQuan;
        $data->noiThuongTru = $request->noiThuongTru;
        $data->soCCCD = $request->soCCCD;
        $data->noiCap = $request->noiCap;
        $data->ngayCap = $request->ngayCap;
        $data->gioiTinh = $request->gioiTinh;
        $data->SDT = $request->SDT;
        $data->matKhau = sha1($request->matKhau);
        $data->CCCDtruoc = $cccdTruocPath;
        $data->CCCDsau = $cccdSauPath;
        $data->anhDaiDien = $anhDaiDienPath;
        $data->save();

        $ref = $request->ref;
        if ($ref == 'front') {
            return redirect('dangki')->with('success', 'Đã đăng kí tài khoản thành công.');
        }

        return redirect('admin/HinhAnhPhongTro/create')->with('success', 'Dữ liệu đã được thêm vào.');
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
            'SDT'=>'required',
            'matKhau'=>'matKhau',
        ]);
         // Handle file uploads for CCCD truoc
         if ($request->hasFile('CCCDtruoc')) {
            $cccdTruocPath = $request->file('CCCDtruoc')->store('cccdtruoc', 'public');
        }
        // Handle file uploads for CCCD sau
        if ($request->hasFile('CCCDsau')) {
            $cccdSauPath = $request->file('CCCDsau')->store('cccdsau', 'public');
        }

        // Handle file uploads for anh dai dien
        if ($request->hasFile('anhDaiDien')) {
            $anhDaiDienPath = $request->file('anhDaiDien')->store('anhdaidien', 'public');
        }

        $data=HinhAnhPhongTros::find($id);
        $data->hoKhach = $request->hoKhach;
        $data->tenKhach = $request->tenKhach;
        $data->ngaySinh = $request->ngaySinh;
        $data->queQuan = $request->queQuan;
        $data->noiThuongTru = $request->noiThuongTru;
        $data->noiCap = $request->noiCap;
        $data->soCCCD = $request->soCCCD;
        $data->ngayCap = $request->ngayCap;
        $data->gioiTinh = $request->gioiTinh;
        $data->SDT = $request->SDT;
        $data->matKhau = sha1($request->matKhau);
        $data->CCCDtruoc = $cccdTruocPath;
        $data->CCCDsau = $cccdSauPath;
        $data->anhDaiDien = $anhDaiDienPath;
        $data->save();

        return redirect('admin/HinhAnhPhongTro/'.$id.'/edit')->with('success','Data has been updated.');
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
       return redirect('admin/HinhAnhPhongTro')->with('success','Data has been deleted.');
    }
}