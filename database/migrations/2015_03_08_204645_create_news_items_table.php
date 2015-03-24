<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 250)->default('-sin título-');
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->string('permalink', 250);
            $table->datetime('date');
            $table->softDeletes();
            $table->timestamps();

            $table->integer('feed_id')->unsigned();
            $table->foreign('feed_id')->references('id')->on('feeds');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news');
	}

}
