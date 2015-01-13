<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConf extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('confs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('searchd_id')->unsigned()->index()->nullable();
			$table->foreign('searchd_id')->references('id')->on('searchds')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('indexer_id')->unsigned()->index()->nullable();
			$table->foreign('indexer_id')->references('id')->on('indexers')->onDelete('cascade')->onUpdate('cascade');
			$table->string('title');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('confs');
	}

}
