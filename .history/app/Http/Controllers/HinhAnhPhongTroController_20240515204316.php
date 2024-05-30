namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinhAnhPhongTros;
use App\Models\PhongTros;
use Illuminate\Support\Facades\Storage;

class HinhAnhPhongTroController extends Controller
{
    public function index()
    {
        $data = HinhAnhPhongTros::all();
        $phongtros = PhongTros::all();
        return view('hinhanhphongtro.index', ['data' => $data, 'phongtros' => $phongtros]);
    }

    public function create()
    {
        $phongtros = PhongTros::all();
        return view('hinhanhphongtro.create',['phongtros'=>$phongtros]);
    }

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

    public function destroy($id)
    {
        $hinhanhphongtro = HinhAnhPhongTros::findOrFail($id);
        Storage::disk('public')->delete($hinhanhphongtro->srcHinhAnh);
        $hinhanhphongtro->delete();

        return redirect()->route('hinhanhphongtro.index')->with('success', 'Dữ liệu đã được xóa.');
    }
}
