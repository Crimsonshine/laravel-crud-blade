<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(20);
        return view('post.index', compact('posts'));
    }
}
