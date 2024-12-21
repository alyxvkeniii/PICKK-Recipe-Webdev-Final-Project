<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'user_id', 
        'image', 
        'instructions',
        'ingredients', 
        'ratings', 
        'categories', 
        'status'
    ];
    public function usersFavorited()
    {
        return $this->belongsToMany(User::class, 'favorites', 'recipe_id', 'user_id');
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
