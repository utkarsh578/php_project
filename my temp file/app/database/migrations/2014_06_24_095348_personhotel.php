<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personhotel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personhotel',function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('roomid',10)->foreign('roomid')->references('roomdid')->on('roomaddress');
			$table->string('mobno',11);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personhotel');
	}

}
