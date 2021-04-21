<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function ABOUT()
    {
        # code...
        return view('about');
    }
    public function CONTACT()
    {
        # code...
        return view('contact');
    }
    public function HOME()
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name', 'categories.slug')
            ->paginate(3);
        return view('index', compact('post'));
    }
}
