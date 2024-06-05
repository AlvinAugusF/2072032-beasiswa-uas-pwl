<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBeasiswa extends Model
{
    protected $table = 'kategori_beasiswa';

    protected $fillable = [
        'name'
    ];
    use HasFactory;
}
