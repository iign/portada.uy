<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Feed;
use Illuminate\Support\Str;

class CreateMedios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feeds', function($table)
		{
		    $table->string('slug', 64)->after('feed_url');

		});

		$items = Feed::all();
		foreach( $items as $item )
		{
		    $item->slug = Str::limit( Str::slug( $item->title ), 64, '' );
		    $item->save();
		}

		Schema::table('feeds', function($table)
		{
		    $table->unique('slug');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feeds', function($table)
		{
		    $table->dropColumn('slug');
		});
	}

}
