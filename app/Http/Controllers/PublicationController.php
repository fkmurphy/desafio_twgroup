<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePublication;
use App\Publication;
use Auth;
class PublicationController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $publications = Publication::withCount(['comments' => function($query){
            $query->where('status','=','APROBADO');
        }])->with('user')->get();
        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublication $request)
    {
        
        $publication = new Publication($request->all());
        $publication->user_id = Auth::id();
        $publication->save();

        return redirect()->route('publications.index')->with('sucess','Publicación creada con éxito')->withInput();
    }

    public function greetingHola(){
        $publications = Publication::commentsHola();
        return view('publications.greeting',compact('publications'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $pub = Publication::where('id','=',$id)->withCount(['comments' => function($query){
            $query->where('status','=','APROBADO');
        }])->with('user')->firstOrFail();
        return view('publications.show',compact('pub'));
    }

    public function comment($id){
        return redirect()->route('comments.create',['id'=>$id]);
    }

}
