<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

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
        return view('posts.index', ['posts' => $posts]);
    }

    public function indexWithCategory(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function indexWithUser(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function indexWithTag(Tag $tag)
    {
        $posts = $tag->posts;
        return view('posts.index', ['posts' => $posts]);
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
        $this->addTagsToPost($tags, $post);

        return redirect('/posts');
    }

    private function addTagsToPost($tags, $post)
    {
        foreach($tags as $key => $tag) {
            $model = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($model->id); //建立post和tag關連並把資料填入post_tag裡面
        }
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.show', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function showByAdmin(Post $post)
    {
        return view('posts.showByAdmin', ['post' => $post]);
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

        // foreach($post->tags as $key => $tag) {
        //     $post->tags()->detach($tag->id); //取消關聯並把資料從post_tag裡移除
        // }
        $post->tags()->detach(); //跟上面一樣

        $tags = explode(',', $request->tags); //把標籤用逗號隔開
        $this->addTagsToPost($tags, $post);

        return redirect('/posts/admin');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts/admin');
    }
}
