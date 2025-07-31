<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id(); // auto-increment primary key
            $table->string('subcategory')->notNull()->unique();
            $table->string('img')->notNull();
            $table->foreignId('category_id')->constrained('categories','id')->onDelete('cascade');
            // $table->BigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}