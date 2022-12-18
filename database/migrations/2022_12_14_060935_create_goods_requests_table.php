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
        Schema::create('goods_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_number');
            $table->unsignedBigInteger('request_type_id');
            $table->timestamps();
            $table->foreign('request_type_id')->references('id')->on('request_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_requests');
    }
};
