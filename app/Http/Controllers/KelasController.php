<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::get();

        return view("admin.siswa.kelas", compact("kelas"));
    }
    public function create()
    {
        return view("admin.siswa.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "nama_kelas" => "required",
        ], [
            "nama_kelas.required" => "Nama Kelas harus diisi"
        ]);

        Kelas::create([
            "nama_kelas" => $request->nama_kelas,
        ]);

        return redirect("/kelas")->with("success", "Berhasil menambahkan data kelas.");
    }
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view("admin.siswa.edit", compact("kelas"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama_kelas" => "required",
        ], [
            "nama_kelas.required" => "Nama kelas harus diisi"
        ]);

        Kelas::findOrFail($id)->update([
            "nama_kelas" => $request->nama_kelas,
        ]);

        return redirect("/kelas")->with("success", "Berhasil memperbarui data kelas");
    }
    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();

        return redirect("/kelas")->with("success", "Berhasil menghapus data kelas");
    }
}
