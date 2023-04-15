<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pmSubKriteria extends Model
{
    use HasFactory;

    protected $table = 'pm_subkriteria';

    protected $fillable = [
        'nama_kriteria',
        'bobot',
        'jenis_kriteria',
        'pmkriteria_id'
    ];

    public function pmkriteria()
    {
        return $this->belongsTo(pmKriteria::class);
    }

    public function pmbobotgap()
    {
        return $this->hasMany(pmBobotGap::class);
    }
}
