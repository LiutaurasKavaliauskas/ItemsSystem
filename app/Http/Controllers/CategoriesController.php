<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Categories', ['categories' => Category::all()]);
    }

    /**
     * Create new category
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $request)
    {
        Category::create(['title' => $request->title]);

        return redirect()->back();
    }

    /**
     * Edit category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryRequest $request, $id)
    {
        Category::where('id', $id)->update(['title' => $request->title]);

        return redirect()->back();
    }

    /**
     * Remove the specified category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->back();
    }
}
