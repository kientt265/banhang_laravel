<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Lỗi 1: $filltable đánh sai chính tả (nên là $fillable)
// Lỗi 2: Tên function relationship không đúng (nên là products thay vì category)
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
