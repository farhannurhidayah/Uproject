<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'nama_buku',
        'gambar',
    ];

    public $timestamps = false;

    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_buku');
    }
}
