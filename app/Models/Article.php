<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title_fr', 'title_en', 'content_fr', 'content_en'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etudiant()
{
    return $this->belongsTo(Etudiant::class, 'etudiant_id');
}

}
