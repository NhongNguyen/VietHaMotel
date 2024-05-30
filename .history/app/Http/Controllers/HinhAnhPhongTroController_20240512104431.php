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
        $data = HinhAnhPhongTros::all();
        $phongtros = PhongTros::all();
        return view('hinhanhphongtro.index', ['data' => $data, 'phongtros' => $phongtros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongtros = PhongTros::all();
        return view('hinhanhphongtro.create',['phongtros'=>$phongtros]);
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
            'srcHinhAnh.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads for srcHinhAnh
        $srcHinhAnhPaths = [];
        if ($request->hasFile('srcHinhAnh')) {
            foreach ($request->file('srcHinhAnh') as $file) {
                $srcHinhAnhPaths[] = $file->store('srcHinhAnh', 'public');
            }
        }

        foreach ($srcHinhAnhPaths as $srcHinhAnhPath) {
            $data = new HinhAnhPhongTros;
            $data->id_phong_tro = $request->id_phong_tro;
            $data->srcHinhAnh = $srcHinhAnhPath;
            $data->save();
        }

        return redirect('admin/hinhanhphongtro/create')->with('success', 'Dữ liệu đã được thêm vào.');
    }
  /**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $hopdong = HinhAnhPhongTros::findOrFail($id);
    // Xóa hợp đồng
    $hopdong->delete();

    return redirect('admin/')->with('success', 'Dữ liệu đã được xóa.');
}}