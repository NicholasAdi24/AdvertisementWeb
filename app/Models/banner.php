<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key dari tabel
    public $timestamps = true; // Untuk timestamps

    protected $fillable = [
        'banner_image', // Path gambar banner
        'title',        // Judul banner
        'subtitle',     // Sub judul banner
        'link',         // Link menuju deskripsi barang
    ];

    // Method untuk mendapatkan URL gambar banner
    public function getBannerImageUrlAttribute()
    {
        return asset('storage/banners/' . $this->banner_image);
    }
}
