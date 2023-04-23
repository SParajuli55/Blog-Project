<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;

class Blog extends Model
{
    use HasFactory;
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
     }

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image',
    ];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\BlogFactory::new();
    }
}
