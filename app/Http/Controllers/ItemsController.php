<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Items', ['items' => Item::all(), 'categories' => Category::pluck('title', 'id')->toArray()]);
    }

    /**
     * Show specific item information
     *
     * @param $id
     * @return string
     */
    public function showItem($id)
    {
        return response()->json(Item::where('id', $id)->first());
    }

    /**
     * Creation of new item
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ItemRequest $request)
    {
        Item::create(['title'       => $request->title,
                      'count'       => $request->count,
                      'price'       => $request->price,
                      'description' => $request->description,
                      'category_id' => $request->category_id]);


        return redirect()->back();
    }

    /**
     * Edit item
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemRequest $request, $id)
    {
        Item::where('id', $id)->update(['title' => $request->title,
                                        'count' => $request->count,
                                        'price' => $request->price,
                                        'description' => $request->description,
                                        'category_id' => $request->category_id]);

        return redirect()->back();
    }


    /**
     * Remove item.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::where('id', $id)->delete();

        return redirect()->back();
    }
}
