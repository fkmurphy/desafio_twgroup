<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

define("WORD_RESUME",70);

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
            ->join('users as u','p.user_id','=','u.id')
            ->where('c.status','=','APROBADO')
            ->whereRaw("c.content REGEXP '.*hola.*'")
            ->select('p.id','p.content','p.user_id','p.title','u.name as user')
            ->groupBy('p.id','p.title')
            ->get();
      
        return $db;
    }
    public function resume(){
        $content = $this->content;
        return strlen($content) > WORD_RESUME ? 
            substr($content,0,strpos(wordwrap($content,WORD_RESUME),"\n"))."..." :
            $content;
    }
   
}
