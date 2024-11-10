<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Menentukan nama tabel jika berbeda dari konvensi
     *
     * @var string
     */
    protected $table = 'user'; // Sesuaikan dengan nama tabel Anda

    /**
     * Menentukan primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_user'; // Sesuaikan dengan primary key Anda

    /**
     * Menonaktifkan timestamps jika tabel tidak memilikinya
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama', // Sesuaikan dengan kolom 'nama' di tabel Anda
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast the attributes to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed', // Automatically hash the password
    ];
}
