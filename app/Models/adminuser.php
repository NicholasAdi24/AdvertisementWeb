<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user'; // Menentukan nama tabel
    protected $primaryKey = 'id_user'; // Menentukan primary key
    public $timestamps = true; // Mengaktifkan timestamps

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    // Jika Anda ingin meng-hash password sebelum menyimpannya
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = bcrypt($user->password); // Meng-hash password
        });
    }
}
