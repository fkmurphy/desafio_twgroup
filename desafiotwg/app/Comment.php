<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
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
        return $this->belongsTo(Publication::class,'publication_id','id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getCreatedAtAttribute( $value ) {
       return (new Carbon($value))->format('d/m/y');
    }
}
