<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('type')->nullable();
			$table->text('i_name')->nullable();
			$table->text('agent')->nullable();
			$table->text('agent_blackhole')->nullable();
			$table->text('agent_connect_timeout')->nullable();
			$table->text('agent_persistent')->nullable();
			$table->text('agent_query_timeout')->nullable();
			$table->text('ha_strategy')->nullable();
			$table->text('ha_ping_interval')->nullable();
			$table->text('ha_period_karma')->nullable();
			$table->text('source')->nullable();
			$table->text('path')->nullable();
			$table->text('docinfo')->nullable();
			$table->text('morphology')->nullable();
			$table->text('index_sp')->nullable();
			$table->text('index_zones')->nullable();
			$table->text('html_strip')->nullable();
			$table->text('min_stemming_len')->nullable();
			$table->text('stopwords')->nullable();
			$table->text('wordforms')->nullable();
			$table->text('embedded_limit')->nullable();
			$table->text('exceptions')->nullable();
			$table->text('html_index_attrs')->nullable();
			$table->text('rt_field')->nullable();
			$table->text('rt_attr')->nullable();
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
		Schema::drop('indices');
	}

}
