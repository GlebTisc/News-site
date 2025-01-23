<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $with = ['news'];
    protected $table = 'simple_blog.categories';

    public function news() {
        return $this->hasMany(News::class);
    }

    public static function getAllNews() {
        $categories = Category::all();
        $array = array();

        foreach($categories as $category) {
            $array = array_merge($array, $category->news->all());
        }

        return $array;
    }
}
