<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id(); // auto-increment primary key
            $table->string('category')->notNull()->unique();
            $table->string('slug')->unique();
            $table->string('color')->unique();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
