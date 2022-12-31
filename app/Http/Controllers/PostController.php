<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::get()->sortByDesc('created_at');
        $posts = Post::paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'user_id' => 'required',
        ]);

        $p = new Post;
        $p->title =  $request['title'];
        $p->content =  $request['content'];
        // $p->user_id = Auth::id(); 
        $p->user_id = $request['user_id'];
        $p->save();

        session()->flash('message', 'Post was created.');
        return redirect()->route('posts.index');
        //return "Pased Validation";
        //return redirect('/posts')->with('success', 'Game is successfully saved');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['user_id_old' => $post->user_id]);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'user_id' => 'required|same:user_id_old',
        ]);
        $post->title =  $request['title'];
        $post->content =  $request['content'];
        // $p->user_id = Auth::id(); 
        //$p->user_id = $request['user_id'];
        $post->save();
        session()->flash('message', 'Post was edited.');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Post was deleted.');
        return redirect()->route('posts.index');

        // return ('posts.show')->with('message', 'Post was deleted'); 
    }
}
