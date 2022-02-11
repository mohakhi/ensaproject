<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'image_name',
        'path',
        'category_id',
        'user_id'
        
        
       ];

    public function categories()
       {
           return $this->belongsToMany(Category::class);
       }

       public function users()
       {
           return $this->belongsToMany(User::class);
       }   
}
