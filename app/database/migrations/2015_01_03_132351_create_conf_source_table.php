<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfSourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conf_sources', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('source_id')->unsigned()->index();
			$table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('conf_id')->unsigned()->index();
			$table->foreign('conf_id')->references('id')->on('confs')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('conf_sources');
	}

}
