<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpirationDatesTable extends Migration
{
    public function up()
    {
        Schema::create('expiration_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->date('expiration_date')->notNull();
            $table->integer('qty')->notNull();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expiration_dates');
    }
}
