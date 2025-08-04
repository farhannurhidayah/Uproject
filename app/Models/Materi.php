<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model {
    protected $primaryKey = 'id_materi';

    protected $fillable = [
        'id_user',
        'id_buku',
        'nama_materi',
        'video'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function buku() {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function tugas() {
        return $this->hasMany(Tugas::class, 'id_materi');
    }
}