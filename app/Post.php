<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function getDateAttribute(){
        return $this->created_at->format('d-m-Y');
    }

    // public function getCoverPathAttribute(){
    //     return $this->cover ? Storage::disk('uploads')->url($this->cover) : null;
    // }

    protected $appends = ['date'];
}
