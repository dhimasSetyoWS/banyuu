<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kategori extends Model
{
    //
    use HasFactory;

    // PENTING: Definisi nama tabel karena tidak mengikuti standar plural Inggris
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'slug',
    ];

    // Opsional: Relasi balik ke Course (One to Many)
    public function courses()
    {
        return $this->hasMany(Course::class, 'kategori_id');
    }
}
