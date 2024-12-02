<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title_fr', 'title_en', 'file_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}