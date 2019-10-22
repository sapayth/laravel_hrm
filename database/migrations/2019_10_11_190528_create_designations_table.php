<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lhrm_designations', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 100);
            $table->unsignedSmallInteger('dept_id');
            $table->timestamps();
            $table->foreign('dept_id')
                  ->references('id')->on('lhrm_departments')
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
        Schema::table('designations', function (Blueprint $table) {
            //
        });
    }
}
