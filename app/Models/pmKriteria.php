<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pmKriteria extends Model
{
    use HasFactory;

    protected $table = 'pm_kriteria';

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan'
    ];

    public function pmsubkriteria()
    {
        return $this->belongsToMany(pmSubKriteria::class);
    }
}
