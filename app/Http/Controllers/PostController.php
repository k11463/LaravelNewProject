<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::all();
        return view('posts.admin', ['posts' => $posts]);
    }

    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function indexWithCategory(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        $categories = Category::all();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function indexWithPostUser(Post $post)
    {
        $posts = Post::where('user_id', $post->user->id)->get();
        $categories = Category::all();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function create()
    {
        $post = new Post;
        $categories = Category::all();
        return view('posts.create', ['post' => $post, 'categories' => $categories]);
    }

    public function store(StoreBlogPost $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

        $tags = explode(',', $request->tags); //把標籤用逗號隔開
        foreach($tags as $key => $tag) {
            $model = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($model->id);
        }
        // TODO
        // create / load tags
        // connect post & tags

        // redirect to index
        return redirect('/posts');
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        if (Auth::check()) {
            return view('posts.showByAdmin', ['post' => $post]);
        }
        else {
            return view('posts.show', ['post' => $post, 'categories' => $categories]);
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(StoreBlogPost $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();

        return redirect('/posts/admin');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts/admin');
    }
}
