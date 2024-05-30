<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThanhViens;
use App\Models\PhongTros;

class ThanhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ThanhViens::all();
        return view('thanhvien.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('thanhvien.create');
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
            'hoThanhVien'=>'required',
            'tenThanhVien'=>'required',
            'CCCDtruoc' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'CCCDsau' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads for CCCD truoc
        if ($request->hasFile('CCCDtruoc')) {
            $cccdTruocPath = $request->file('CCCDtruoc')->store('cccdtruoc', 'public');
        }

        // Handle file uploads for CCCD sau
        if ($request->hasFile('CCCDsau')) {
            $cccdSauPath = $request->file('CCCDsau')->store('cccdsau', 'public');
        }
        
        
        $data = new ThanhViens;
        $data ->hoThanhVien=$request->hoThanhVien;
        $data ->tenThanhVien=$request->tenThanhVien;
        $data->CCCDtruoc = $cccdTruocPath;
        $data->CCCDsau = $cccdSauPath;
       
        $data ->save();
        
        $ref = $request->ref;
        if ($ref == 'frontregister') {
            return redirect('memregister')->with('success', 'Đã đăng kí tài khoản thành công.');
        }

        return redirect('admin/thanhvien/create')->with('success','Dữ liệu đã được thêm vào.');
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
        $data=ThanhViens::find($id);
        return view('thanhvien.show',['data'=>$data]);
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
        $data=ThanhViens::find($id);
        return view('thanhvien.edit',['data'=>$data]);
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
            'hoThanhVien'=>'required',
            'tenThanhVien'=>'required',
            'CCCDtruoc' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'CCCDsau' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads for CCCD truoc
        if ($request->hasFile('CCCDtruoc')) {
            $cccdTruocPath = $request->file('CCCDtruoc')->store('cccdtruoc', 'public');
        }

        // Handle file uploads for CCCD sau
        if ($request->hasFile('CCCDsau')) {
            $cccdSauPath = $request->file('CCCDsau')->store('cccdsau', 'public');
        }
        
        
        $data = ThanhViens::find($id);
        $data ->hoThanhVien=$request->hoThanhVien;
        $data ->tenThanhVien=$request->tenThanhVien;
        $data->CCCDtruoc = $cccdTruocPath;
        $data->CCCDsau = $cccdSauPath;
        $data ->save();

        return redirect('admin/thanhvien/'.$id.'/edit')->with('success','Dữ liệu đã được cập nhật.');
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
        ThanhViens::where('id', $id)->delete();
        return redirect('admin/thanhvien/')->with('success','Dữ liệu đã được xóa.');
    }

    public function chonThanhVien(Request $request)
    {
        $phongId = $request->input('phong_id');
        $phongTro = PhongTros::find($phongId);
    
        if (!$phongTro) {
            // Handle the case where PhongTros is not found
            return back()->with('error', 'Phòng không tồn tại.');
        }
    
        if ($request->input('inlineRadioOptions') === 'mem') {
            // Chuyển hướng đến trang đăng ký thành viên và truyền biến phong_id
            return view('memregister')->with('phong_id', $phongId);
        } else {
            $phongTro->id_thanh_vien = $request->inlineRadioOptions;
            $phongTro->save();
    
            return view('rooregister')->with('phong_id', $phongId);
        }
    }

}
