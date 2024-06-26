<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama_siswa', 'kelas_id', 'domisili_siswa'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
