<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cookie;


class AdminController extends Controller
{
    function login(){
        return view('login');
    }

    function kiem_tra_tai_khoan(Request $request){
        $request->validate([
            'tenQTV' => ' required',
            'matKhau' => ' required',
        ]);
        $qtv = 
    }
}
