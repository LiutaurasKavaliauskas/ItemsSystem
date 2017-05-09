<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemsCategoriesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items_categories_connections', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_items_categories_connections_categories1')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('item_id', 'fk_items_categories_connections_items')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items_categories_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_items_categories_connections_categories1');
			$table->dropForeign('fk_items_categories_connections_items');
		});
	}

}
