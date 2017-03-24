<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'title',
        'content',
        'introdution',
        'published_at'
    ];

    public function setPublishedAtAttribute($data)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $data);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();;
    }

    public function getTAgListAttribute()
    {
        return $this->tags->pluck('id')->all();
    }
}
