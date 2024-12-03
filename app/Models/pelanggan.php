<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    //
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama_pelanggan',
        'telp',
        'jenis_kelamin',
        'alamat',
        'kota',
        'provinsi',
    ];
}
