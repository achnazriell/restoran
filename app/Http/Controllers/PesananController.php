<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Minuman;
use App\Models\Pelanggan;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Carbon\Carbon;

Carbon::setLocale('id');

class PesananController extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');
    $query = Pesan::with(['pelanggan', 'makanan', 'minuman']);

    if ($search) {
        $query->whereHas('pelanggan', function($query) use ($search) {
                $query->where('nama_pelanggan', 'like', '%' . $search . '%')
                      ->orWhere('telepon_pelanggan', 'like', '%' . $search . '%')
                      ->orWhere('tanggal_pesan', 'like', '%' . $search . '%');
            })
            ->orWhereHas('makanan', function($query) use ($search) {
                $query->where('nama_makanan', 'like', '%' . $search . '%');
            })
            ->orWhereHas('minuman', function($query) use ($search) {
                $query->where('nama_minuman', 'like', '%' . $search . '%');
            });
    }

    $data = $query->get();

    return view('pesan', compact('data'));
}



    public function create()
    {
        $makanan = Makanan::all();
        $minuman = Minuman::all();
        return view('create-pesan', compact('makanan', 'minuman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'telepon_pelanggan' => 'required|string|max:15',
            'tanggal_pesan' => 'required',
            'id_makanan' => 'required|exists:makanan,id_makanan',
            'jumlah_makanan' => 'required|integer|min:1',
            'id_minuman' => 'required|exists:minuman,id_minuman',
            'jumlah_minuman' => 'required|integer|min:1',
        ], [
            'required' => 'Bidang ini wajib diisi',
            'string' => 'Bidang ini harus berupa tek',
            'max' => 'Bidang ini tidak boleh lebih dari :max karakter',
            'integer' => 'Bidang ini harus berupa angka',
            'min' => 'Bidang ini tidak boleh kurang dari :min',
            'exists' => 'Item yang dipilih tidak valid',
        ]);

        try {
            $pelanggan = Pelanggan::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'telepon_pelanggan' => $request->telepon_pelanggan,
                'tanggal_pesan' => $request->tanggal_pesan,
            ]);

            Pesan::create([
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'id_makanan' => $request->id_makanan,
                'jumlah_makanan' => $request->jumlah_makanan,
                'id_minuman' => $request->id_minuman,
                'jumlah_minuman' => $request->jumlah_minuman,
            ]);

            return redirect()->route('admin.pesan')->with('tpsuccess', 'Pesanan berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('tperror', 'Gagal membuat pesanan');
        }
    }

    public function delete($id_pesan)
    {
        try {
            $pesan = Pesan::findOrFail($id_pesan);
            $pesan->delete();
            return redirect()->route('admin.pesan')->with('dpsuccess', 'Pesanan berhasil dihapus');
        } catch (\Exception) {
            return redirect()->route('admin.pesan')->with('dperror', 'Gagal menghapus pesanan');
        }
    }

    public function edit($id_pesan)
    {
        $pesan = Pesan::with('pelanggan')->findOrFail($id_pesan);
        $makanan = Makanan::all();
        $minuman = Minuman::all();
        return view('edit-pesan', compact('pesan', 'makanan', 'minuman'));
    }

    public function update(Request $request, $id_pesan)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'telepon_pelanggan' => 'required|string|max:15',
            'tanggal_pesan' => 'required',
            'id_makanan' => 'required|exists:makanan,id_makanan',
            'jumlah_makanan' => 'required|integer|min:1',
            'id_minuman' => 'required|exists:minuman,id_minuman',
            'jumlah_minuman' => 'required|integer|min:1',
        ], [
            'required' => 'Bidang ini wajib diisi',
            'string' => 'Bidang ini harus berupa teks',
            'max' => 'Bidang ini tidak boleh lebih dari :max karakter',
            'integer' => 'Bidang ini harus berupa angka',
            'min' => 'Bidang ini tidak boleh kurang dari :min',
            'exists' => 'Item yang dipilih tidak valid',
        ]);

        try {
            $pesan = Pesan::findOrFail($id_pesan);
            $pelanggan = $pesan->pelanggan;

            $pelanggan->update([
                'nama_pelanggan' => $request->nama_pelanggan,
                'telepon_pelanggan' => $request->telepon_pelanggan,
                'tanggal_pesan' => $request->tanggal_pesan,
            ]);

            $pesan->update([
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'id_makanan' => $request->id_makanan,
                'jumlah_makanan' => $request->jumlah_makanan,
                'id_minuman' => $request->id_minuman,
                'jumlah_minuman' => $request->jumlah_minuman,
            ]);

            return redirect()->route('admin.pesan')->with('upsuccess', 'Pesanan berhasil diperbarui');
        } catch (\Exception) {
            return redirect()->route('admin.pesan')->with('uperror', 'Gagal memperbarui pesanan');
        }
    }
}
