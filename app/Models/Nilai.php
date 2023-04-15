<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'siswa_id',
        'ipa',
        'ips',
        'matematika',
        'bahasa_indonesia',
        'bahasa_inggris'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
