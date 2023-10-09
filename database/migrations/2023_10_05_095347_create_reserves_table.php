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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->date('reserve_date');
            $table->foreignId('day_id');
            $table->foreignId('time_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->text('text');
            $table->foreignId('admin_id');
            $table->foreignId('user_id');
            $table->foreignId('classroom_id');
            $table->string('classroom_name')->nullable();
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
        Schema::dropIfExists('reserves');
    }
};
