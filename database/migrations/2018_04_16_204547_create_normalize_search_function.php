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
//        \Illuminate\Support\Facades\DB::statement("CREATE FUNCTION normalize_search( textvalue VARCHAR(10000) ) RETURNS VARCHAR(10000)
//
//BEGIN
//
//    SET @textvalue = textvalue;
//
//    -- ACCENTS
//    SET @withaccents = 'ŠšŽžÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝŸÞàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿþƒ';
//    SET @withoutaccents = 'SsZzAAAAAAACEEEEIIIINOOOOOOUUUUYYBaaaaaaaceeeeiiiinoooooouuuuyybf';
//    SET @count = LENGTH(@withaccents);
//
//    WHILE @count > 0 DO
//        SET @textvalue = REPLACE(@textvalue, SUBSTRING(@withaccents, @count, 1), SUBSTRING(@withoutaccents, @count, 1));
//        SET @count = @count - 1;
//    END WHILE;
//
//    -- SPECIAL CHARS
//    SET @special = '!@#$%¨&*()_+=§¹²³£¢¬\"`´{[^~}]<,>.:;?/°ºª+*|\\''';
//    SET @count = LENGTH(@special);
//
//    WHILE @count > 0 do
//        SET @textvalue = REPLACE(@textvalue, SUBSTRING(@special, @count, 1), '');
//        SET @count = @count - 1;
//    END WHILE;
//
//    RETURN @textvalue;
//
//END;");
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