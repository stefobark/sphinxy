<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sources', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('s_name');
			$table->text('sql_host');
			$table->integer('sql_port');
			$table->text('sql_user');
			$table->text('sql_pass');
			$table->text('sql_db');
			$table->text('sql_sock')->nullable();
			$table->text('mysql_connect_flags')->nullable();
			$table->text('mysql_ssl_cert')->nullable();
			$table->text('mysql_ssl_key')->nullable();
			$table->text('mysql_ssl_ca')->nullable();
			$table->text('attributes')->nullable();
			$table->text('sql_query');
			$table->text('sql_joined_field')->nullable();
			$table->text('sql_query_range')->nullable();
			$table->text('mssql_winauth')->nullable();
			$table->text('sql_column_buffers')->nullable();
			$table->text('odbc_dsn')->nullable();
			$table->text('type')->nullable();
			$table->text('xmlpipe_command')->nullable();
			$table->text('xml_fixup_utf8')->nullable();
			$table->text('tsvpipe_command')->nullable();
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
		Schema::drop('sources');
	}

}
