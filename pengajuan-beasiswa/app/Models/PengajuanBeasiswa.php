<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBeasiswa extends Model
{
    protected $table = 'pengajuan_beasiswa';

    protected $fillable = [
        'beasiswa_id',
        'isApprovedByDekan',
        'dekan_id',
        'isApprovedByProgramStudi',
        'program_studi_id',
    ];
    use HasFactory;
}
