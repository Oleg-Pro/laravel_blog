<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Revision extends Model
{
    protected $fillable = ['title', 'content', 'is_current', 'post_id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('current', function (Builder $builder) {
            $builder->where('is_current', '=', true);
        });
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
