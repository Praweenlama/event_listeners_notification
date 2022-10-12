<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Notifications\PostCreatedNotification;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request,[
            'title' => ['required'],
            'body' => ['required']
        ]);

        $post = Post::create($data);

        event(new PostCreated($post));

        auth()->user()->email->notify(new PostCreatedNotification($post));
        
        return redirect()->route('home');
    }
}
