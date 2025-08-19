<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kandidat()
{
    return $this->belongsTo(Kandidat::class);
}

    protected $table = 'pekerjaan';

    protected $fillable = [
        'kandidat_id',
        'nama_perusahaan',
        'jabatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];
}
