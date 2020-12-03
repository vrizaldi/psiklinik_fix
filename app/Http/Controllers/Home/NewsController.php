<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function serve(Request $request) {
        $blogs = null;
        if(is_null($request['query'])) $blogs = Blog::orderBy('created_at', 'desc')->get();
        else $blogs = Blog::whereRaw('UPPER(title) like \'%' . $request['query'] . '%\'')
            ->orWhereRaw('UPPER(blogs.desc) like \'%' . $request['query'] . '%\'')
            ->orWhereRaw('UPPER(content) like \'%' . $request['query'] . '%\'')
            ->orderBy('created_at', 'desc')->get();
        return view('home.news', ['query' => $request['query'], 'blogs' => $blogs]);
    }

    public function showContent($id) {
        $blog = Blog::find($id);
        return view('home.newspost', ['blog' => $blog]);
    }
}
