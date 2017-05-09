<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('Items', ['items' => $items]);
    }

    /**
     * Creation of new item
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ItemRequest $request)
    {

        Item::create(['title' => $request->title, 'count' => $request->count, 'price' => $request->price, 'description' => $request->description]);

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
        Item::where('id', $id)->update(['title' => $request->title, 'count' => $request->count, 'price' => $request->price, 'description' => $request->description]);

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
