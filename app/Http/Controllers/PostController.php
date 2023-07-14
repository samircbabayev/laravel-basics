<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(Request $request)
    {
        $params = $request->validate([
            'title' => 'required',
            'body' => '',
        ]);

        $params['title']    = strip_tags($params['title']);
        $params['body']     = strip_tags($params['body']);
        $params['user_id']  = auth()->id();
        Post::create($params);
 
        return redirect('/');
    }

    public function editView(Post $post)
    {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('edit-post',['post' => $post]);
    }

    public function editAction(Post $post, Request $request)
    {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $params = $request->validate([
            'title' => 'required',
            'body' => '',
        ]);
        $params['title']    = strip_tags($params['title']);
        $params['body']     = strip_tags($params['body']);

        $post->update($params);
        return redirect('/');
    }

    public function delete(Post $post)
    {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $post->delete(); 
        return redirect('/');
    }
}
 