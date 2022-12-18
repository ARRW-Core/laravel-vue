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
        //connect goods and goods_requests
        Schema::create('requested_goods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('goods_request_id');
            $table->uuid('good_id');
            $table->timestamps();
            $table->foreign('good_id')->references('item_id')->on('goods');
            $table->foreign('goods_request_id')->references('id')->on('goods_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
