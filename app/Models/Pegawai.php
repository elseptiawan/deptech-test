<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'no_hp',
        'alamat',
        'jenis_kelamin'
    ];

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
}
