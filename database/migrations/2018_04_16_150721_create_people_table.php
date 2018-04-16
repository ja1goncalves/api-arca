<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePeopleTable.
 */
class CreatePeopleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table) {
            $table->increments('id');
			$table->string('institution',100);
			$table->string('cpf',20);
			$table->string('name',100);
			$table->string('registration',20);
			$table->string('category',50)->nullable();
			$table->string('office',50)->nullable();
			$table->string('function_person',50)->nullable();
			$table->decimal('maturity_office', 10, 2)->nullable();
			$table->decimal('value_liquid', 10, 2)->nullable();
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
		Schema::drop('people');
	}
}
