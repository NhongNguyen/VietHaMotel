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
            'id_phong_tro' => 'required|exists:phongtros,id',
            'srcHinhAnh.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('srcHinhAnh')) {
            foreach ($request->file('srcHinhAnh') as $file) {
                $path = $file->store('srcHinhAnh', 'public');

                $data = new HinhAnhPhongTros;
                $data->id_phong_tro = $request->id_phong_tro;
                $data->srcHinhAnh = $path;
                $data->save();
            }
        }

        return redirect()->route('hinhanhphongtro.create')->with('success', 'Dữ liệu đã được thêm vào.');
    }
  /**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $hinhanhphongtro = HinhAnhPhongTros::findOrFail($id);
    // Xóa hợp đồng
    $hinhanhphongtro->delete();

    return redirect('admin/hinhanhphongtro')->with('success', 'Dữ liệu đã được xóa.');
}}