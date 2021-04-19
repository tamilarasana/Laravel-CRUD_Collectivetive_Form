<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_models', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('project_category_id')->nullable();
            $table->string('project_name', 50)->nullable();
            $table->text('description', 50)->nullable();
            $table->text('feature', 50)->nullable();
            $table->integer('available_qty')->nullable();
            $table->string('project_number',15)->nullable();
            $table->string('price',15)->nullable();
            $table->string('discount')->nullable();
            $table->string('sales_price')->nullable();
            $table->date('start_date',false, false)->nullable()->index();
            $table->date('end_date', false, false)->nullable()->index();
            $table->string('images');
            $table->tinyInteger('status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('project_models');
    }
}
