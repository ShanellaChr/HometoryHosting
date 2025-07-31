<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id(); // auto-increment primary key

            $table->string('title')->notNull();
            $table->string('slug')->notNull();
            $table->longText('content')->notNull();
            $table->string('thumbnail')->notNull();
            // $table->unsignedBigInteger('admin_id');
            $table->timestamps();
            // $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
            $table->foreignId('admin_id')->constrained('users','id')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}