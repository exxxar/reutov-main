<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('test_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('finished_at');
            $table->integer('correct');
            $table->json('answers')->nullable();
            $table->integer('questions');
            $table->boolean('is_finished');
            $table->boolean('is_passed');
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
        Schema::dropIfExists('attempts');
    }
}
