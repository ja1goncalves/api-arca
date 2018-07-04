<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthDateToPeopleInssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people_insses', function (Blueprint $table) {
            $table->string('birth_date', 12)->after('cpf')->nullable();
            $table->string('beneficiary_nu', 12)->after('birth_date')->nullable();
            $table->string('name', 50)->change();
            $table->string('cpf', 15)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people_insses', function (Blueprint $table) {
            //
        });
    }
}
