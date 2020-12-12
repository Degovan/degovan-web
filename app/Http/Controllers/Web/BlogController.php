<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc')->paginate(6);
        $data = [
            'title'  => 'Blog',
            'nav'    => 'blog',
            'post'   => $post
        ];

        return view('web.blog.index', $data);
    }
}
