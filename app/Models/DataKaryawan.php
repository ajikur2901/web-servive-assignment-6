<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    // table name
    protected $table = "data_karyawan";

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        "id_karyawan", "nama_karyawan", "alamat", "telepon"
    ];
}
