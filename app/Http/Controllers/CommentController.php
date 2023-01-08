<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;
use App\Notifications\PostComment;

class CommentController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:255',
            'user_id' => 'required',
        ]);

        $c = new Comment;
        $c->content =  $request['content'];
        $c->user_id = $request['user_id'];
        $c->post_id = $request['post_id'];
        $c->save();
        $p = Post::find($c->post_id);
        $p->user->notify(new PostComment($p));
        session()->flash('message', 'Comment was created.');
        // return redirect()->route('posts.index');
        return redirect()->back();
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
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
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
        $comment = Comment::findOrFail($id);
        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['user_id_old' => $comment->user_id]);
        if (Auth::user()->roles->contains('edit_all_posts', 1)) {
            $validated = $request->validate([
                'content' => 'required|max:255',
            ]);
        }
        else{
        $validated = $request->validate([
            'content' => 'required|max:255',
            'user_id' => 'required|same:user_id_old',
            
        ],
        [
            'user_id.same' => 'You are not the owner or Admin',
        ]);}
        $comment->content =  $request['content'];

        $comment->save();
        session()->flash('message', 'Comment was edited.');
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
        $commet = Comment::findOrFail($id);
        $commet->delete();
        session()->flash('message', 'Comment was deleted.');
        return redirect()->route('posts.index');
    }
}
