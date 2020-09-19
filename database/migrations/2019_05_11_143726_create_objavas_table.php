<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjavasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objave', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naslov', 45);
            $table->string('podnaslov', 45)->nullable();
            $table->boolean('istaknuta')->default(false);
            $table->text('sadrzaj');
            $table->integer('autor_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            /*
               "Soft" brisanje. Postavlja se datum kada je objava izbrisana i ne prikazuje se
               unutar aplikacije, ali ipak postoji unutar baze podataka. Jako korisna funkcionalnost, moguće implementirati
               "košaru za smeće".
            */

            $table->foreign('autor_id')
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
        Schema::dropIfExists('objave');
    }
}
