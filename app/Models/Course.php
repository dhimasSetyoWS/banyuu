<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'title_course',
        'slug',
        'description',
        'price',
        'kategori_id',
        'user_id',
    ];

    /**
     * Relasi ke User (Pembuat Kursus / Guru)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function sessions()
    {
        return $this->hasMany(CourseSession::class)->orderBy('order');
    }

    /**
     * Relasi ke Kategori
     * Karena tabelnya bernama 'kategori', pastikan Model Kategori juga mendefinisikan $table = 'kategori'
     */

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
