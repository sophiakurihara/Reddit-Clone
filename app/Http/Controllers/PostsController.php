<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Vote;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

        // $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->has('search')) {
            $posts = Post::with('user')->with('votes')
            ->where('title', 'LIKE', "%$request->search%")
            ->orWhereHas('user', function ($query) use($request){ 
                $query->where('name', 'LIKE', "%$request->search%");
            })
            ->orderBy('created_by', 'ASC')
            ->paginate(4);         
            $posts->appends($request->all());

        } else {
            $posts = Post::with('user')->with('votes')
            ->orderBy('created_by', 'DESC')
            ->paginate(4);
        }


        $data = [];
        $data['posts'] = $posts;

        return view('posts.index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        $rules = array(
        'title' => 'required|max:100',
        'url'   => 'required', 
        'content' => 'required'
        );

        $this->validate($request, $rules);
        //
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = \Auth::id();
        $post->save();

        \Log::info("New post saved", $request->all());

        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        $data = [];
        $data['post'] = $post;
        return view('posts.show')->with($data);
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
        $post = Post::find($id);

        if(!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

        $data = [];
        $data['post'] = $post;

        return view('posts.edit')-with($data);
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
        $rules = [
            'title' => 'required|max:100',
            'url' => 'required|url',
            'content' => 'required'
        ];

        $this->validate($request, $rules);

        //return back()->withInput();
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = $request->created_by;
        $post->save();

        $data = [];
        $data['post'] = $post;

        return view('posts.show')->with($data);
    }

    public function vote(Request $request, $id)
    {
        $vote = new Vote();
        $vote->user_id = \Auth::id(); //gets ID for current user logged in
        $vote->vote = $request->vote;
        $vote->post_id = $id;
        $vote->save();

        $data = [];
        $data['vote'] = $vote;

        return redirect()->action('PostsController@vote');

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
        $post = \App\Models\Post::find($id);
        $post->delete();

        return redirect()->action('PostsController@index');
    }
}
