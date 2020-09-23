<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Http\Requests\CategoryRequest;
use com_exception;
use Exception;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.access:categories.create', ['only' => ['create', 'store']]);
        $this->middleware('sentinel.access:categories.view', ['only' => ['index', 'show', 'trash']]);
        $this->middleware('sentinel.access:categories.update', ['only' => ['edit', 'update']]);
        $this->middleware('sentinel.access:categories.delete', ['only' => ['delete']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('Centaur::categories.index', compact('categories'));
    }

    /**
     * Display a listing of all soft deleted records.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('Centaur::categories.trash', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id')->toArray();
        return view('Centaur::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\OfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        $category = new Category();
        try{
            $newCategory = $category->saveCategory($data);

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'You have successfully added a new category with ID:'.$newCategory->id);

        return Redirect::route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('Centaur::categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Centaur::categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\OfficeRequest  $request
     * @param  \App\Models\Office $office
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->except(['_token', '_method']);
        try{
            $updatedCategory = $category->updateCategory($data);

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'You have successfully update category with ID:'.$category->id);

        return Redirect::route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        try{
            $category->deleteCategory();

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'Category with ID:'.$category->id. ' has been deleted');

        return Redirect::route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        try{
            $category->restore();

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'Category with ID:'.$category->id. ' has been successfully restored');

        return Redirect::route('categories.index');
    }
}
