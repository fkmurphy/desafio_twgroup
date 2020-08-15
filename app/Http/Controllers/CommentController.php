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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'content' => 'required'
        ]);
        $user = Auth::user();

        $comment = new Comment($request->all());
        $comment->user_id = Auth::id();
        $comment->status = "APROBADO";
        $comment->publication_id = $id;
        $comment->save();
       
        return redirect()->route('publications.index')->with('sucess','Publicación creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
