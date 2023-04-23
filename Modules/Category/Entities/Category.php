<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\Blog;

class Category extends Model
{
    use HasFactory;
    public function blogs(){
        $this->hasMany(Blog::class);
    }

    protected $fillable = [
        'name',
    ];

    protected static function newFactory()
    {
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }
}
