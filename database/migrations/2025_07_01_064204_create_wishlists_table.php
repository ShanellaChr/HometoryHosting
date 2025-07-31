<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id(); // auto-increment primary key

            $table->string('items_name')->notNull();
            $table->unsignedBigInteger('category_id');
            $table->string('items_description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
};