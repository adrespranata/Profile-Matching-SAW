<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pmBobotGap extends Model
{
    use HasFactory;

    protected $table = 'pm_bobotgap';

    protected $fillable = [
        'pmkriteria_id',
        'pmsubkriteria_id',
        'selisih',
        'bobot',
        'keterangan'
    ];

    public function pmsubkriteria()
    {
        return $this->belongsTo(pmSubKriteria::class);
    }
}
