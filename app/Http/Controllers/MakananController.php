<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MakananController extends Controller
{
    public function index()
    {
        $data = Makanan::all();
        return view('makanan', compact('data'));
    }

    public function create()
    {
        return view('create-makanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required|unique:makanan,nama_makanan',
            'harga_makanan' => 'required|numeric|min:1',
            'foto_makanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $foto_makanan = $request->file('foto_makanan');
            $filename     = date('d-F-Y') . $foto_makanan->getClientOriginalName();
            $path         = 'foto_makanan/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($foto_makanan));

            Makanan::create([
                'nama_makanan' => $request->nama_makanan,
                'harga_makanan' => $request->harga_makanan,
                'foto_makanan' => $filename,
            ]);

            return redirect()->route('admin.makanan')->with('tmsuccess', 'Makanan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('tmerror', 'Gagal menambahkan makanan' . $e->getMessage());
        }
    }


    public function delete($id_makanan)
    {
        try {
            $makanan = Makanan::findOrFail($id_makanan);
            Storage::delete($makanan->foto_makanan);
            $makanan->delete();
            return redirect()->route('admin.makanan')->with('dmsuccess', 'Makanan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.makanan')->with('dmerror', 'Gagal menghapus makanan');
        }
    }

    public function edit($id_makanan)
    {
        $makanan = Makanan::find($id_makanan);
        return view('edit-makanan', compact('makanan'));
    }

    public function update(Request $request, $id_makanan)
    {
        $request->validate([
            'nama_makanan' => 'required|unique:makanan,nama_makanan,' . $id_makanan . ',id_makanan',
            'harga_makanan' => 'required|numeric|min:1',
            'foto_makanan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_makanan.required' => 'Nama makanan wajib diisi',
            'nama_makanan.unique' => 'Makanan sudah ada di menu',
            'harga_makanan.required' => 'Harga makanan wajib diisi',
            'harga_makanan.numeric' => 'Harga makanan harus berupa angka',
            'harga_makanan.min' => 'Harga makanan tidak boleh kurang dari 1',
            'foto_makanan.image' => 'Foto makanan harus berupa gambar',
            'foto_makanan.mimes' => 'Format foto makanan tidak didukung',
            'foto_makanan.max' => 'Ukuran foto makanan tidak boleh lebih dari 2MB',
        ]);

        try {
            $makanan = Makanan::findOrFail($id_makanan);

            if ($request->hasFile('foto_makanan')) {
                Storage::delete($makanan->foto_makanan);
                $path = $request->file('foto_makanan')->store('public/foto_makanan');
                $makanan->update([
                    'foto_makanan' => $path,
                ]);
            }

            $makanan->update([
                'nama_makanan' => $request->nama_makanan,
                'harga_makanan' => $request->harga_makanan,
            ]);

            return redirect()->route('admin.makanan')->with('umsuccess', 'Makanan berhasil diedit');
        } catch (\Exception $e) {
            return redirect()->route('admin.makanan')->with('umerror', 'Gagal Mengedit Makanan');
        }
    }
}
