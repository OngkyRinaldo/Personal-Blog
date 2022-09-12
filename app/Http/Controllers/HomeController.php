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

    public function admin()
    {
        $user = Auth::user()
        ->username;
        return view('cms.admin.index', compact('user'));
    }
    public function post()
    {
        $posts = Post::with('category', 'post_author')->get();
        return view('cms.admin.post', compact('posts'));
    }

    public function user()
    {
        $users = User::all();

        return view('cms.admin.users', compact('users'));
    }
}
