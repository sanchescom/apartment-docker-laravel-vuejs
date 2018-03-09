<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('move_in_date');
            $table->string('street');
            $table->string('post_code');
            $table->string('city');
            $table->string('country');
            $table->string('email');
            $table->string('token', '40')->unique();
        });

        DB::unprepared('
            CREATE TRIGGER generate_token_for_apartment BEFORE INSERT ON apartments
            FOR EACH ROW
            BEGIN
                SET NEW.token = SUBSTRING(MD5(RAND()) FROM 1 FOR 40);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');

        DB::unprepared('DROP TRIGGER `generate_token_for_apartment`');
    }
}
