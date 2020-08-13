<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';

    protected $fillable = [
        'title', 'content'
    ];

    protected $guarded = [
        'user_id'
    ];

    public function comments(){
        return $this->hasMany(Comment::class,'publication_id','id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
   
}
