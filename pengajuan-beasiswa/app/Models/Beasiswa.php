<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswa';

    protected $fillable = [
        'mahasiswa_id',
        'periode_id',
        'category_id',
        'ipk',
        'transkrip_akademik',
        'surat_rekomendasi_dosen',
        'surat_pernyataan_beasiswa',
        'bukti_keaktifan',
        'dokumen_pendukung_lain'
    ];
    use HasFactory;
}
