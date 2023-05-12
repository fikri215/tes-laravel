<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = ['nama_pegawai', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'alamat', 'kode_kelurahan', 'kode_provinsi'];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kode_kelurahan', 'kode');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kode_provinsi', 'kode');
    }
}
