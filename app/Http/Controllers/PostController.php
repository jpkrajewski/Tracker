<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\CarbonImmutable;

class PostController extends Controller
{   

    public function index()
    {
        $id = auth()->user()->id;
        $now = CarbonImmutable::now();
        $todayPost = Post::where('user_id', $id)->whereBetween('created_at', [$now->startOfDay(), $now->endOfDay()])->first();
        $notes = Post::where('user_id', $id)->latest()->first()->notes->reverse();

        return view('posts.index', [
            'posts' => Post::where('user_id', $id)->orderBy('created_at', 'DESC')->get(),
            'todayPost' => $todayPost,
            'latestNotes' => $notes,
            'user_id' => $id,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        return redirect()->route('posts.show', ['post' => $post])->withSuccess('Post created. Write.');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'notes' => $post->notes->reverse(),
        ]);
    }
}
