<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePeopleInssesTable.
 */
class CreatePeopleInssesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people_insses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('cpf', 20);
            $table->string('phone', 20)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('country')->default('BR');
            $table->string('state', 4)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('district', 200)->nullable();
            $table->string('street', 300)->nullable();
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
		Schema::drop('people_insses');
	}
}
