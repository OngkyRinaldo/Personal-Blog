<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::query()
                ->when(request('search'), function ($query) {
                    $query->where('title', 'like', '%' .request('search') . '%')
                        ->orWhere('content', 'like', '%' .request('search') . '%');
                })
                ->with('category')
                ->latest()
                ->get();

        return view('index', compact('posts'));
    }
    public function post(Post $post)
    {
        return view('pages.posts.index', compact('post'));
    }
    public function categories()
    {
        $categories = Category::orderBy('title', 'asc')
        ->get();
        return view('pages.categories.index', compact('categories'));
    }
    public function category(Category $category)
    {
        $posts = Post::query()
                 ->where('category_id', $category->id)
                ->with('category')
                ->latest()
                ->get();
        return view('pages.categories.category', compact('posts', 'category'));
    }
    public function tag(Tag $tag)
    {
        $posts = $tag->posts()
                ->with('category')
                ->latest()
                ->get();

        return view('pages.tags.index', compact('posts', 'tag'));
    }
    public function author(User $user)
    {
        $posts = Post::query()
                ->where('author', $user->id)
                ->with('category')
                ->latest()
                ->get();


        return view('pages.authors.index', compact('user', 'posts'));
    }
}
