<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        $kelas = Kelas::get();

        return view("admin.siswa.siswa", compact("siswa", "kelas"));
    }
    public function create()
    {
        return view("admin.siswa.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "nama_siswa" => "required",
            "kelas_id" => "required",
            "domisili_siswa" => "required",
        ], [
            "nama_siswa.required" => "Nama Siswa harus diisi",
            "kelas_id.required" => "Kelas Siswa harus diisi",
            "domisili_siswa.required" => "Domisili Siswa harus diisi",
        ]);

        Siswa::create([
            "nama_siswa" => $request->nama_siswa,
            "kelas_id" => $request->kelas_id,
            "domisili_siswa" => $request->domisili_siswa,
        ]);

        return redirect("/siswa")->with("success", "Berhasil menambahkan data siswa.");
    }
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::findOrFail($id);

        return view("admin.siswa.edit", compact("siswa"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama_siswa" => "required",
            "kelas_id" => "required",
            "domisili_siswa" => "required",
        ], [
            "nama_siswa.required" => "Nama Siswa harus diisi",
            "kelas_id.required" => "Kelas Siswa harus diisi",
            "domisili_siswa.required" => "Domisili Siswa harus diisi",
        ]);

        Siswa::findOrFail($id)->update([
            "nama_siswa" => $request->nama_siswa,
            "kelas_id" => $request->kelas_id,
            "domisili_siswa" => $request->domisili_siswa,
        ]);

        return redirect("/siswa")->with("success", "Berhasil memperbarui data siswa");
    }
    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect("/siswa")->with("success", "Berhasil menghapus data siswa");
    }
}
