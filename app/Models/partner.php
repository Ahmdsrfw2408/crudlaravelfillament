<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class partner extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'thumbnail', 'content', 'link'];

    protected static function boot() // untuk mengganti gambar yang ada agar tidak double jadi kalau gambar pertama ada mau di ganti gambar pertama akan hilang supaya tidak ada penumpukan file
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('thumbnail') && ($model->getOriginal('thumbnail') != null)) { // isDirty = data lama dan getOriginal = data baru
                Storage::disk('public')->delete($model->getOriginal('thumbnail'));
            }
        });
    }
}
