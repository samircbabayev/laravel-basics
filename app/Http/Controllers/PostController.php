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
}
 