<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = ['file'];
    protected $table = 'cv';

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
}
