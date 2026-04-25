<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // 🔥 tambahin ini

class Post extends Model
{
    use HasFactory;
    
protected $fillable = ['title','content','image','category_id'];

    // 🔥 TAMBAHIN INI
public function categories()
{
    return $this->belongsToMany(Category::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}
}