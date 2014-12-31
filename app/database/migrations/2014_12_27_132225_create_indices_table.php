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
			$table->text('type');
			$table->text('i_name');
			$table->text('agent');
			$table->text('agent_blackhole');
			$table->text('agent_connect_timeout');
			$table->text('agent_persistent');
			$table->text('agent_query_timeout');
			$table->text('ha_strategy');
			$table->text('ha_ping_interval');
			$table->text('ha_period_karma');
			$table->text('i_s_name');
			$table->text('i_path');
			$table->text('docinfo');
			$table->text('morphology');
			$table->text('i_sp');
			$table->text('i_zones');
			$table->text('html_strip');
			$table->text('min_stemming_len');
			$table->text('stopwords');
			$table->text('wordforms');
			$table->text('embedded_limit');
			$table->text('exceptions');
			$table->text('index_type');
			$table->text('html_index_attrs');
			$table->text('rt_field');
			$table->text('rt_attr');
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
