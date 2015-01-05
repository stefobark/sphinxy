<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndexersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indexers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('mem_limit')->nullable();
			$table->string('max_iops')->nullable();
			$table->string('max_iosize')->nullable();
			$table->string('max_xmlpipe2_field')->nullable();
			$table->string('write_buffer')->nullable();
			$table->string('max_file_field_buffer')->nullable();
			$table->string('on_file_field_error')->nullable();
			$table->string('lemmatizer_cache')->nullable();
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
		Schema::drop('indexers');
	}

}
