<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Exception;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        $categoryName = Post::first()->category->category_name;
        return view('Centaur::home', compact('posts','categoryName'));
    }
}
