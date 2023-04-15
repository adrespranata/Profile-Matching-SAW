<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sawSubKriteria extends Model
{
    use HasFactory;

    protected $table = 'saw_subkriteria';

    protected $fillable = [
        'sawkriteria_id',
        'nama_kriteria',
        'bobot',
        'jenis_kriteria'
    ];

    public function sawkriteria()
    {
        return $this->belongsTo(sawKriteria::class);
    }
}
