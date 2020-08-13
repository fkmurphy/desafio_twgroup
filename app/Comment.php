<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'status', 'content'
    ];

    protected $guarded = [
        'publication_id'
    ];

    public function publication(){
        return $this->belongsTo(Publication::class,'id','publication_id');
    }
}
