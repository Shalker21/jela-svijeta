<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('meal_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('status');
            $table->string('lang');

            $table->index(['lang', 'status']);

            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');

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
        Schema::dropIfExists('meal_translations');
    }
}
