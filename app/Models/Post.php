<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    // menambahkan atribut baru yang tidak ada di dalam tabel post
    protected $appends = ['stored_at'];

    // function untuk memformat attribute baru yang disisipkan di model Post yaitu stored_at
    public function getStoredAtAttribute()
    {
        // attribute stored_at misalnya memformat dari atribut created_at
        return $this->created_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
