<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class PostController extends Controller
{
    use AuthorizesRequests;
    public function index(){
        return 'pain';
    }
    public function show($url)
    {
        $post = Post::where('url', $url)->firstOrFail();
        return view('showpost', compact('post'));
    }
    public function showbyUser(){
        $posts = Post::all();
        return view('dashboard.posts',compact('posts'));



    }
    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('showpostbyuser');
    }
    public function create(){
      
        $categories = Category::all();
        return view('dashboard.newpost', compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'content' => ['required', 'string', 'max:255'],
            'url'=> ['required','max:20'],
            'status'=>['required'],
            'tags'=>['string'],

        ]);
      

        $post = new Post();
        $post->author_id = Auth::id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->url = $request->url;
        
        $post->save();
        $post->categories()->attach($request->categories);
        return redirect()->route('showpost', ['url' => $request->url]);

    }
}