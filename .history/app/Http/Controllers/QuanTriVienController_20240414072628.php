<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\QuanTriViens;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class QuanTriVienController extends Controller
{
    //Hàm đăng nhập
    function dang_nhap(){
        return view('login');
    }

    //Hàm kiểm tra tài khoản mật khẩu đăng nhập 
    function kiemtra_dangnhap(Request $request){
        $request->validate([
            'SDT' => 'required',
            'matKhau' => 'required',
        ]);
        $admin = QuanTriViens::where(['SDT'=>$request->SDT,'matKhau'=>sha1($request->matKhau)])->count();
        if($admin>0){
            $adminData=QuanTriViens::where(['SDT'=>$request->SDT,'matKhau'=>sha1($request->matKhau)])->first();
            session(['adminData'=>$adminData]);
    
            if($request->has('rememberme')){
                Cookie::queue('adminSDT',$request->SDT,43200);
                Cookie::queue('adminmatKhau',$request->matKhau,43200);
            }
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Nhập tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại!!');
        }
    }    
    //Hàm logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    } 
    //Hàm dashboard
    function dashboard(){
        return view('dashboard');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = QuanTriViens::all();
        return view('quantrivien.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('quantrivien.create');
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
            'tenQTV'=>'required',
            
            'SDT'=>'required',
            'moTa'=>'required',
        ]);
        $data = new QuanTriViens;
        $data ->tenQTV=$request->tenQTV;
        $data ->donGia=$request->donGia;
        $data ->moTa=$request->moTa;
        $data ->save();
        
        return redirect('admin/quantrivien/create')->with('success','Dữ liệu đã được thêm vào.');
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
        $data=QuanTriViens::find($id);
        return view('quantrivien.show',['data'=>$data]);
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
        $data=QuanTriViens::find($id);
        return view('quantrivien.edit',['data'=>$data]);
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
        $data = QuanTriViens::find($id);
        $data ->tenQTV=$request->tenQTV;
        $data ->donGia=$request->donGia;
        $data ->moTa=$request->moTa;
        $data ->save();

        return redirect('admin/quantrivien/'.$id.'/edit')->with('success','Dữ liệu đã được cập nhật.');
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
        QuanTriViens::where('id', $id)->delete();
        return redirect('admin/quantrivien  /')->with('success','Dữ liệu đã được xóa.');
    }
}
