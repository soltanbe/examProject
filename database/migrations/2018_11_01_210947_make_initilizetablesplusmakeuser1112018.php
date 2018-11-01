<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class MakeInitilizetablesplusmakeuser1112018 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'soltan',
            'email' => 'soltanbe@gmail.com',
            'password' => encrypt('123456'),
        ]);

        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('height');
            $table->string('mass');
            $table->string('hair_color');
            $table->string('skin_color');
            $table->string('eye_color');
            $table->string('birth_year');
            $table->string('homeworld');
            $table->string('url');
            $table->text('films');
            $table->text('species');
            $table->text('vehicles');
            $table->text('starships');
            $table->dateTime('created');
            $table->dateTime('edited');
        });
        /*DB::statement("
      CREATE TABLE people (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            height VARCHAR(3) NOT NULL,
            mass VARCHAR(50),
            hair_color VARCHAR(10),
            skin_color VARCHAR(10),
            eye_color VARCHAR(10),
            birth_year VARCHAR(50),
            gender VARCHAR(10),
            homeworld VARCHAR(255),
    		url VARCHAR(255), 
            films TEXT,
            species TEXT,
            vehicles TEXT,
            starships TEXT,
            created TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
            `edited` TIMESTAMP DEFAULT))
        ");*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
