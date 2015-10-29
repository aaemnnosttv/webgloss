<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermAliasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_aliases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('term_id')->unsigned();
            $table->string('name', 100);
            $table->timestamps();

            $table->foreign('term_id')
                ->references('id')
                ->on('terms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('term_aliases');
    }
}
