<?php

namespace App\Http\Controllers\cms;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'post_author')->get();

        return view('cms.pages.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        $categories = Category::all();
        return view('cms.pages.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
         'title' => 'required|unique:posts,title|min:38',
         'category' =>'required',
         'content' =>'required',
         'tags' =>'required',
         'image' => 'nullable|image|mimes:jpg,png|max:1024'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = '/images/post/';

            $filename = Str::slug($request->title) . '-' . time() . '.' . $image->extension();
            $image->move(public_path($path), $filename);
        }


        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'descriptions' => Str::limit(strip_tags($request->content, 100)),
            'content' => strip_tags($request->content),
            'author' => auth()->id(),
            'image' => $request->hasFile('image') ? $filename : null
        ]);

        $post->tags()->sync($request->tags);




        return redirect()->route('post.index')
            ->with('success', 'post has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('cms.pages.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $post_tagIDS = $post
            ->tags
            ->pluck('id')
            ->toArray();

        $categories = Category::all();

        return view('cms.pages.post.edit', compact('post', 'tags', 'categories', 'post_tagIDS'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:38',
            'category' =>'required',
            'content' => 'required|string',
            'tags' => 'required',
            'image' => 'nullable|image|mimes:jpg,png|max:1024'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = '/images/post/';
            if ($request->oldImage) {
                File::delete(public_path('images/post/' . $post->image));
            }

            $filename = Str::slug($request->title) . '-' . time() . '.' . $image->extension();
            $image->move(public_path($path), $filename);
        }

        $post -> update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'content' => $request->content,
            'descriptions' => Str::limit(strip_tags($request->content, 100)),
            'author' => auth()->id(),
            'image' => $request->hasFile('image') ? $filename : null
        ]);
        $post->tags()
            ->sync($request->tags);

        return redirect()->route('post.index')
                ->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        File::delete(public_path('images/post/' . $post->image));

        $post->delete();

        return redirect()->route('post.index')
            ->with('success', 'Post has been deleted');
    }
}
