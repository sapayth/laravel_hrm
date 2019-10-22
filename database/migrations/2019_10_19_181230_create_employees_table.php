<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lhrm_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('father_name', 50);
            $table->string('mother_name', 50);
            $table->dateTime('dob');
            $table->tinyInteger('gender_id');
            $table->char('contact_1', 9);
            $table->string('contact_2', 9)->nullable();
            $table->text('present_addrs');
            $table->text('permanent_addrs');
            $table->string('email', 50)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('emp_id', 20);
            $table->unsignedInteger('dept_id');
            $table->unsignedInteger('desig_id');
            $table->dateTime('joining_date');
            $table->float('salary', 8, 2);
            $table->string('bank_acc_name', 50)->nullable();
            $table->string('bank_acc_no', 20)->nullable();
            $table->string('bank_name', 50)->nullable();
            $table->string('bank_branch', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
