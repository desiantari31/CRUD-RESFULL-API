<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bayi', 'nama_bayi', 'alamat', 'umur_bayi', 'nama_ibu', 'bb', 'panjang_bayi', 'telp', 'foto'
    ];

}
