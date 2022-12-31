<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

use Auth;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::get()->sortBy('name');
        
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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

        $p = new User;
        $p->title =  $request['title'];
        $p->content =  $request['content'];
        // $p->user_id = Auth::id(); 
        $p->user_id = $request['user_id'];
        $p->save();

        session()->flash('message', 'user was created.');
        return redirect()->route('users.index');
        //return "Pased Validation";
        //return redirect('/users')->with('success', 'Game is successfully saved');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        //$posts = User::findOrFail($id)->posts;
        //$posts = DB::table('posts')->where('user_id', auth()->id())->get();
        $posts = Post::whereBelongsTo($user)->get();
        $comments = Comment::whereBelongsTo($user)->get();
        //dd($comments);
        return view('users.show', ['user' => $user, 'posts' => $posts, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
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
        // $user = user::findOrFail($id);
        // $request->request->add(['user_id' => Auth::id()]);
        // $request->request->add(['user_id_old' => $user->user_id]);
        // $validated = $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required|max:255',
        //     'user_id' => 'required|same:user_id_old',
        // ]);
        // $user->title =  $request['title'];
        // $user->content =  $request['content'];
        // // $p->user_id = Auth::id(); 
        // //$p->user_id = $request['user_id'];
        // $user->save();
        // session()->flash('message', 'user was edited.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        session()->flash('message', 'user was deleted.');
        return redirect()->route('users.index');

        // return ('users.show')->with('message', 'user was deleted'); 
    }
}
