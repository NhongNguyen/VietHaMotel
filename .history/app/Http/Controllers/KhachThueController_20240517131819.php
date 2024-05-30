<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachThues;
use Illuminate\Support\Facades\Cookie;

class KhachThueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KhachThues::all();
        return view('khachthue.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khachthue.create');
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

        $data = new KhachThues;
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
            return redirect('register')->with('success', 'Đã đăng kí tài khoản thành công.');
        }

        return redirect('admin/khachthue/create')->with('success', 'Dữ liệu đã được thêm vào.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KhachThues::find($id);
        return view('khachthue.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KhachThues::find($id);
        return view('khachthue.edit', ['data' => $data]);
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
            'CCCDtruoc' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'CCCDsau' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $data = KhachThues::find($id);
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
        $data->CCCDtruoc = $cccdTruocPath ?? $data->CCCDtruoc;
        $data->CCCDsau = $cccdSauPath ?? $data->CCCDsau;
        $data->anhDaiDien = $anhDaiDienPath ?? $data->anhDaiDien;
        $data->save();

        return redirect('admin/khachthue/' . $id . '/edit')->with('success', 'Dữ liệu đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KhachThues::where('id', $id)->delete();
        return redirect('admin/khachthue')->with('success', 'Dữ liệu đã được xóa.');
    }

    // Login
    function login()
    {
        return view('frontlogin');
    }

    function khachthue_login(Request $request)
    {
        $request->validate([
            'SDT' => 'required',
            'matKhau' => 'required',
        ]);

        $SDT = $request->SDT;
        $matKhau = sha1($request->matKhau);
        $khachThue = KhachThues::where(['SDT' => $SDT, 'matKhau' => $matKhau])->first();

        if ($khachThue) {
            session(['khachthuelogin' => true, 'data' => $khachThue, 'id_khach_thue' => $khachThue->id]);
            $khachThueData=KhachThues::where(['SDT'=>$request->SDT,'matKhau'=>sha1($request->matKhau)])->first();
            session(['adminData'=>$adminData]);
            if ($request->has('rememberme')) {
                Cookie::queue('khachThueSDT', $request->SDT, 43200);
                Cookie::queue('khachThuematKhau', $request->matKhau, 43200);
            }

            return redirect('/');
        } else {
            return redirect('login')->with('error', 'Nhập tài khoản hoặc mật khẩu không đúng!!');
        }
    }

    // Register
    function register()
    {
        return view('register');
    }

    // Logout
    function logout()
    {
        session()->forget(['khachthuelogin', 'data']);
        return redirect('login');
    }
}
