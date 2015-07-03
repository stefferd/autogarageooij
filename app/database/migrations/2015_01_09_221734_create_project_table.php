<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');

            $table->string('role', 250);
            $table->string('customer', 250);
            $table->string('location', 250);
            $table->string('start',50);
            $table->string('end',50);
            $table->string('main_pic',250);
            $table->integer('catalog_id');
            $table->integer('user_id');
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
        Schema::drop('projects');
	}

}
