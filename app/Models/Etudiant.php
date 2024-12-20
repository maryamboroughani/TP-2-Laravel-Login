<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'adresse', 
        'telephone', 
        'email', 
        'date_de_naissance', 
        'ville_id',
        'password',
    ];

      // the relationship to Ville
      public function ville()
      {
          return $this->belongsTo(Ville::class);
      }

      public function articles()
{
    return $this->hasMany(Article::class, 'etudiant_id');
}
      public function users()
{
    return $this->hasMany(User::class);
}


}
