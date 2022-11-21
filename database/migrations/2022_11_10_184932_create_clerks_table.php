<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clerks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jop_id')->constrained('jops');
            $table->string('name');
            $table->integer('emirate');
            $table->string('education');
            $table->date('dob');
            $table->string('phone');
            $table->boolean('verified')->default(0);
            $table->enum('status',['new','pending','rejected','accepted'])->default('new');
            $table->text('summury')->nullable();
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
        Schema::dropIfExists('clerks');
    }
};
