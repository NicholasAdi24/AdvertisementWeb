<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $table = 'iklan'; // Menentukan nama tabel jika berbeda dari konvensi
    protected $primaryKey = 'id_iklan'; // Menentukan primary key
    public $timestamps = true; // Mengaktifkan timestamps

    protected $fillable = [
        'title',
        'deskripsi',
        'image',
        'image2',      // Gambar tambahan 2
        'image3',      // Gambar tambahan 3
        'image4',      // Gambar tambahan 4
        'image5',      // Gambar tambahan 5
        'galeri1',     // Galeri tambahan 1
        'galeri2',     // Galeri tambahan 2
        'galeri3',     // Galeri tambahan 3
        'galeri4',     // Galeri tambahan 4
        'galeri5',     // Galeri tambahan 5
        'genre_id',    // Menambahkan genre_id ke dalam fillable
        'section_id',
        'linkgmaps',   // Menambahkan kolom linkgmaps
        'linkembed',   // Menambahkan kolom linkembed
        'link_ig'      // Menambahkan kolom link_ig
    ];

    // Jika ada relasi ke genre
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    // Relasi ke section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id_section');
    }

    // Untuk mendapatkan URL gambar
    public function getImageUrlAttribute()
    {
        return asset('storage/iklan/' . $this->image);
    }

    // Untuk mendapatkan URL galeri
    public function getGaleriUrlAttribute($galeri)
    {
        return asset('storage/iklan/' . $this->$galeri);
    }
}
