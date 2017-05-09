<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsCategoriesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_categories_connections', function(Blueprint $table)
		{
			$table->integer('item_id')->index('fk_items_categories_connections_items_idx');
			$table->integer('category_id')->index('fk_items_categories_connections_categories1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items_categories_connections');
	}

}
