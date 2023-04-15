<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sawKriteria extends Model
{
    use HasFactory;
    protected $table = 'saw_kriteria';

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan'
    ];

    public function sawsubkriteria()
    {
        return $this->belongsToMany(sawSubKriteria::class);
    }
}
