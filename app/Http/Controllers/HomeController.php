<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $user = Auth::user()
        ->username;

        $posts = Post::with('category', 'post_author')->get();

        return view('cms.index', compact('user', 'posts'));
    }

    public function admin(User $user)
    {
        $user = Auth::user()
        ->username;

        $posts = Post::with('category', 'post_author')->get();
        return view('cms.admin.index', compact('user', 'posts'));
    }
}
