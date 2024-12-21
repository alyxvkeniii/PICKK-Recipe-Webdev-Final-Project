<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Add the fillable properties
    protected $fillable = ['recipe_id', 'user_id', 'comment'];
}
