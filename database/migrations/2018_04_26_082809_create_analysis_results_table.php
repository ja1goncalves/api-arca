<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAnalysisResultsTable.
 */
class CreateAnalysisResultsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analysis_results', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('person_id');
			$table->integer('search_id_old');
			$table->integer('search_id_new');
			$table->integer('type');
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
		Schema::drop('analysis_results');
	}
}
