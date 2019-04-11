<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const DRAFT_STATUS = 0;
    const PUBLISH_STATUS = 1;


    protected $fillable = ['name', 'title', 'content', 'status', 'posted_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at');;
    }

    public function revisions()
    {
        return $this->hasMany('App\Revision');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopePosted($query)
    {
        return $query->where('status', '=', self::PUBLISH_STATUS);
    }
}
