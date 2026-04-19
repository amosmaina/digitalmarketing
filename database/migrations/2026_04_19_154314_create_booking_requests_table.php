<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('booking_requests', function (Blueprint $blueprint) {
            $blueprint->id();
            // Step 1
            $blueprint->date('arrival_date');
            $blueprint->integer('nights');
            $blueprint->string('date_type'); // exact/approximate
            $blueprint->text('visit_details');
            
            // Step 2
            $blueprint->json('selected_safaris')->nullable();
            $blueprint->text('additional_activities')->nullable();
            $blueprint->string('budget_range');
            
            // Step 3
            $blueprint->integer('adults');
            $blueprint->integer('children');
            
            // Step 4
            $blueprint->boolean('travel_insurance')->default(false);
            $blueprint->boolean('international_flights')->default(false);
            $blueprint->boolean('safari_hats')->default(false);
            
            // Step 5
            $blueprint->string('full_name');
            $blueprint->string('email');
            $blueprint->string('phone');
            $blueprint->json('contact_methods')->nullable();
            $blueprint->text('additional_comments')->nullable();
            
            $blueprint->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_requests');
    }
}
