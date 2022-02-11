<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [
                'description','like','unlike' ,"post_id" ,"user_id" 
               
               ];        
}
