<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{   

    public function index()
    {
        $now = CarbonImmutable::now();
        $todayPost = Post::whereBetween('created_at', [$now->startOfDay(), $now->endOfDay()])->first();
        return view('posts.index', [
            'posts' => Post::orderBy('created_at')->get(),
            'todayPost' => $todayPost,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $this->show(Post::create());
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'notes' => $post->notes->reverse(),
        ]);
    }
}
