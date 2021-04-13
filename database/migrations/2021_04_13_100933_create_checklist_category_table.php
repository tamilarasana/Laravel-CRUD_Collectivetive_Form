<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_category', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->integer('created_by', false, false)->nullable()->index();
            $table->integer('updated_by', false, false)->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist_category');
    }
}
