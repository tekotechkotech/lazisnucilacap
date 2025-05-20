<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Pest\Plugins\Profile;

class User extends Authenticatable
{

    public $table = 'users';
    public $primaryKey = 'id_user';

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'first_name',
        'last_name',
        
        'role',
        'no_telp',
        'alamat',

        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

// Dashboard

// User

// =Profile
// Gambar Landing
// Visi
// Misi
// Mitra
// Komponen Ziswaf
// Pilar & Program
// Kontak Petugas
// Pilihan Wakaf
// Pilihan infaq
// Pilihan qurban
// Laporan


// =Halaman & Donasi
// Berita
// Campaign
// Update
// Donasi
// Konfirmasi

// Kategori
// Notification