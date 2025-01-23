<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'simple_blog.news';
    protected $with = ['comment'];
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getDate($date) {
        return \Carbon\Carbon::parse($date)->englishMonth . " " . \Carbon\Carbon::parse($date)->day . ", " . \Carbon\Carbon::parse($date)->year;
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
