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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clerk_id')->constrained('clerks');
            $table->string('mil_no');
            $table->string('mil_batch_no');
            $table->string('id_no');
            $table->string('id_export_no');
            $table->string('id_expire_no');
            $table->string('pass_no');
            $table->string('pass_export_no');
            $table->string('pass_expire_no');
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('details');
    }
};
