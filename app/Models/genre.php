<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre'; // Menentukan nama tabel
    protected $primaryKey = 'id_genre'; // Menentukan primary key
    public $timestamps = false; // Jika tidak ada timestamps

    protected $fillable = [
        'genre',
    ];

    // Relasi ke iklan
    public function iklans()
    {
        return $this->hasMany(Iklan::class, 'genre_id', 'id_genre');
    }
}
