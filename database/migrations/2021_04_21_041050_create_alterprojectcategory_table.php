<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlterprojectcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_category', function (Blueprint $table) {
             $table->dropUnique('project_category_name_unique');
            // $table->string('name', 50)->unique(false)->nullable()->change();
            //  $table->string('name', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('project_category', function (Blueprint $table) {
        //     $table->string('name', 50)->nullable(false)->unique()->change();
        //  });
        Schema::dropIfExists('alterprojectcategory');
    }
}
