<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function setTitleAttribute($value) //modificatori // mutators - prima della scrittura
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getImageAttribute($value)
    {
        if (!$value) {
            return '/img/default.jpg';
        }

        if (strpos($value, 'http') !== false) {
            return $value;
        }

        return '/' . $value;
    }
}
