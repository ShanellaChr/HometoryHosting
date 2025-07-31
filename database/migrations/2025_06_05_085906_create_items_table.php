<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id(); // auto-increment primary key

            $table->string('name')->notNull();
            $table->string('slug')->unique();
            $table->string('location')->notNull();
            $table->string('note')->nullable();

            $table->foreignId('category_id')->constrained('categories','id')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategories','id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');

    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
