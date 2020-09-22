<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\Category;

use App\Http\Requests\PostRequest;

use Exception;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.access:users.create', ['only' => ['create', 'store']]);
        $this->middleware('sentinel.access:users.view', ['only' => ['index', 'show', 'trash']]);
        $this->middleware('sentinel.access:users.update', ['only' => ['edit', 'update']]);
        $this->middleware('sentinel.access:users.destroy', ['only' => ['destroy']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        $categoryName = Post::find(5)->category->category_name;
        return view('Centaur::posts.index', compact('posts', 'categoryName'));
    }

    /**
     * Display a listing of all soft deleted records.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(5);
        return view('Centaur::posts.trash', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id')->toArray();
        return view('Centaur::posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PostRequest $request)
    {
        $data = $request->except('_token');
        $post = new Post();
        try{
            $newPost = $post->savePost($data);
        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'You have successfully added a new post with ID:'.$newPost->id);

        return Redirect::route('posts.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Centaur::posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('category_name', 'id')->toArray();
        return view('Centaur::posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->except(['_token', '_method']);
        try{
            $updatedPost = $post->updatePost($data);

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'You have successfully update post with ID:'.$post->id);

        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        try{
            $post->deletePost($id);

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'Post with ID:'.$post->id. ' has been deleted');

        return Redirect::route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        try{
            $post->restore();

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'Post with ID:'.$post->id. ' has been successfully restored');

        return Redirect::route('posts.index');
    }
}
