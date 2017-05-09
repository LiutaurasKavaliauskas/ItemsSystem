<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'count',
        'price',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
//    public function categories()
//    {
//        return $this->belongsToMany(Category::class, (new ItemsCategoriesConnections)->getTable(), 'item_id', 'category_id')->select('title');
//    }

}
