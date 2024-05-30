<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    // Home Page
    function home(){
        $dichvus=DichVus::all();
        $loaiphongs=LoaiPhongs::all();
        $phongtros=PhongTros::all();
        $countPhongTros = $this->countPhongTros(); // Số lượng phòng trọ
        return View('home',['loaiphongs'=>$loaiphongs,'dichvus'=>$dichvus,'phongtros'=>$phongtros,'countPhongTros' => $countPhongTros]);
    }
     // Đếm số lượng phòng trọ
     function countPhongTros() {
        return PhongTros::count();
    }
     function dangKiPhong(Request $request) {
        // Check if the form is submitted
        if($request->isMethod('post')){
            // Check the selected option
            $isMember = $request->input('inlineRadioOptions');

            if($isMember == 'mem') {
                // If the user is a member, redirect to the memregister view
                return view('memregister');
            } else {
                // If the user is not a member, update the room with null membership and redirect to the same page
                $phongId = $request->input('phong_id');
                $phongtro = PhongTros::find($phongId);
                if($phongtro) {
                    $phongtro->thanhVienId = null;
                    $phongtro->save();
                }
                return Redirect::back();
            }
        }
        // Default view if no form submission
        return view('frontlogin');
    }
}
