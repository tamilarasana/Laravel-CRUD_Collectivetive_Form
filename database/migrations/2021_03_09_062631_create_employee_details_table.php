<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 45);
            $table->string('employee_name', 45);
            $table->biginteger('phone_number')->unsigned();
            $table->string('employee_email', 100);
            $table->string('gender', 10);
            $table->string('date_of_birth', 20);
            $table->string('department', 45);
            $table->string('employee_address', 100);
            $table->string('empolyee_image', 255);
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
        Schema::dropIfExists('employee_details');
    }
}
