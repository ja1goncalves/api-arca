<?php

use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNormalizeSearchFunction
 */
class CreateNormalizeSearchFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
        CREATE OR REPLACE FUNCTION normalize_search(str text) RETURNS text AS $$
        DECLARE
            aux   varchar[];
            arr varchar[] := array[
                ['áàãâä','aaaaa'],
                ['ÁÀÃÂÄ','AAAAA'],
                ['éèêë', 'eeee'],
                ['ÉÈÊË', 'EEEE'],
                ['íìîï', 'iiii'],
                ['ÍÌÎÏ', 'IIII'],
                ['óòõôö','ooooo'],
                ['ÓÒÕÔÖ','OOOOO'],
                ['úùûü', 'uuuu'],
                ['ÚÙÛÜ', 'UUUU'],
                ['ñ','n'],
                ['Ñ','N']
            ];

            BEGIN
               FOREACH aux SLICE 1 IN ARRAY arr
               LOOP
                str := TRANSLATE(str, aux[1], aux[2]);
               END LOOP;

               RETURN regexp_replace(str, '[^a-zA-Z0-9 ]', '', 'g');
            END;
        $$ LANGUAGE plpgsql");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement("DROP FUNCTION IF EXISTS normalize_search(text)");
    }
}