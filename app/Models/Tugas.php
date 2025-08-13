<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';

    protected $fillable = [
        'id_materi',
        'nama_tugas',
        'penjelasan',
        'deadline',
        'nilai',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi');
    }
}
