<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Autres configurations du modèle...

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}