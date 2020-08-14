<?php

namespace App;
use DB;
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
    public static function commentsHola(){
        $db = DB::table('publications as p')
            ->rightJoin('comments as c','p.id','=','c.publication_id')
            ->where('c.status','=','APROBADO')
            ->whereRaw("c.content REGEXP '.*hola.*'")
            ->select('p.id','p.content','p.title')
            ->groupBy('p.id','p.title')
            ->get();
      
        return $db;
    }
   
}
