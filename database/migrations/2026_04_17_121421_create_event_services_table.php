<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventServicesTable extends Migration
{
    public function up()
    {
        Schema::create('event_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // e.g., Tents, Audio, Cameras
            $table->decimal('price', 10, 2);
            $table->string('unit'); // e.g., per day, per piece
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_services');
    }
}
