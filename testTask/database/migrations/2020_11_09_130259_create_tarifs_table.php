<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer("ID", true)->length(11)->autoIncrement()->from(7);
            $table->string("title", 255)->charset("cp1251");
            $table->decimal("price", 15, 4);
            $table->string("link", 255)->charset("cp1251");
            $table->integer("speed")->length(11);
            $table->integer("pay_period")->length(11);
            $table->integer("tarif_group_id")->length(11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifs');
    }
}
