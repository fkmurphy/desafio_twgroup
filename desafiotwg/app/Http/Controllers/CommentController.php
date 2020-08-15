<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Comment,Publication};
use App\Http\Requests\UserComment;
use Auth;
use Gate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $publication = Publication::find($id);
        $this->authorize('create',[Comment::class,$id]);
        return view('comments.create',compact('publication'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserComment $request,int $id)
    {
        $user = Auth::user();

        $comment = new Comment($request->all());
        $comment->user_id = $user->id;
        $comment->status = "APROBADO";
        $comment->publication_id = $id;
        $comment->save();
       
        return redirect()->route('publications.index')->with('sucess','Publicación creada con éxito')->withInput();
    }

    
}
