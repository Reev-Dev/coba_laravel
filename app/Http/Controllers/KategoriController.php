<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();

        return view("admin.kategori.kategori", compact("kategori"));
    }
    public function create()
    {
        return view("admin.kategori.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "nama_kategori" => "required",
        ], [
            "nama_kategori.required" => "Nama Kategori harus diisi"
        ]);

        Kategori::create([
            "nama_kategori" => $request->nama_kategori,
        ]);

        return redirect("/kategori")->with("success", "Berhasil menambahkan data kategori.");
    }
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view("admin.kategori.edit", compact("kategori"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama_kategori" => "required",
        ], [
            "nama_kategori.required" => "Nama kategori harus diisi"
        ]);

        Kategori::findOrFail($id)->update([
            "nama_kategori" => $request->nama_kategori,
        ]);

        return redirect("/kategori")->with("success", "Berhasil memperbarui data kategori");
    }
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect("/kategori")->with("success", "Berhasil menghapus data kategori");
    }
}
