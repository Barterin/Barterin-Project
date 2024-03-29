<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        "user_id",
        "penerima",
        "nohp",
        "label",
        "kota",
        "kecamatan",
        "alamat_lengkap",
        "kode_pos",
        "longitude",
        "latitude",
        "main_address"
    ];
}