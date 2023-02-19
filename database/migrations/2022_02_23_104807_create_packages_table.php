<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_type_id');
            $table->foreign('package_type_id')->references('id')->on('package_types')->onDelete('cascade');
            $table->string('shipping_method');
            $table->string('weight');
            $table->string('goods_value');
            $table->string('qty');
            $table->string('price');
            $table->string('package_number');
            $table->string('original_track_id');
            $table->string('boxes_count');
            $table->string('image');
            $table->string('images');
            $table->string('status');
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
        Schema::dropIfExists('packages');
    }
}
