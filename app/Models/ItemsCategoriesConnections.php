<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsCategoriesConnections extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'category_id',
    ];
}
