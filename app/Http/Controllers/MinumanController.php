<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinumanController extends Controller
{
    public function index()
    {
        $data = Minuman::get();
        return view('minuman', compact('data'));
    }

    public function create()
    {
        return view('create-minuman');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_minuman' => 'required|unique:minuman,nama_minuman',
            'harga_minuman' => 'required|numeric|min:1',
            'foto_minuman' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $foto_minuman = $request->file('foto_minuman');
            $filename     = date('d-F-Y'). $foto_minuman->getClientOriginalName();
            $path         = 'foto_minuman/'. $filename;

            Storage::disk('public')->put($path, file_get_contents($foto_minuman));

            Minuman::create([
                'nama_minuman' => $request->nama_minuman,
                'harga_minuman' => $request->harga_minuman,
                'foto_minuman' => $filename,
            ]);

            return redirect()->route('admin.minuman')->with('tmsuccess', 'Minuman berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('tmerror', 'Gagal menambahkan minuman' . $e->getMessage());
        }
    }

    public function delete($id_minuman)
    {
        try {
            $minuman = Minuman::findOrFail($id_minuman);
            $minuman->delete();
            return redirect()->route('admin.minuman')->with('dnsuccess', 'Minuman berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.minuman')->with('dnerror', 'Gagal menghapus minuman');
        }
    }

    public function edit($id_minuman)
    {
        $minuman = Minuman::find($id_minuman);
        return view('edit-minuman', compact('minuman'));
    }

    public function update(Request $request, $id_minuman)
    {
        $request->validate([
            'nama_minuman' => 'required|unique:minuman,nama_minuman,' . $id_minuman . ',id_minuman',
            'harga_minuman' => 'required|numeric|min:1',
        ], [
            'nama_minuman.required' => 'Nama minuman wajib diisi',
            'nama_minuman.unique' => 'Minuman sudah ada di menu',
            'harga_minuman.required' => 'Harga minuman wajib diisi',
            'harga_minuman.numeric' => 'Harga minuman harus berupa angka',
            'harga_minuman.min' => 'Harga minuman tidak boleh kurang dari 1',
        ]);

        try {
            Minuman::where('id_minuman', $id_minuman)->update([
                'nama_minuman' => $request->nama_minuman,
                'harga_minuman' => $request->harga_minuman,
            ]);

            return redirect()->route('admin.minuman')->with('unsuccess', 'Minuman berhasil diedit');
        } catch (\Exception $e) {
            return redirect()->route('admin.minuman')->with('unerror', 'Gagal Mengedit Minuman');
        }
    }
}
