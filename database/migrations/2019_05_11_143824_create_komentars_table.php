<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentari', function (Blueprint $table) {
            $table->increments('id');
            $table->text('sadrzaj');
            $table->integer('objava_id')->unsigned()->nullable();
            $table->integer('korisnik_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('objava_id')
                ->references('id')
                ->on('objave')
                ->onDelete('set null');

            $table->foreign('korisnik_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentari');
    }
}
