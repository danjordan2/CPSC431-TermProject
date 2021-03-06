<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('department_id')->unsigned()->index();
            $table->string('title');
            $table->string('description');
            $table->integer('code')->unsigned();
            $table->integer('unitval')->unsigned();
            $table->unique(array('department_id','code'));
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
