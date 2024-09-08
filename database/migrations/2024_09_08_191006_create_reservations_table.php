<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->date('date'); // Reservation date
            $table->string('time_slot'); // Time slot (breakfast, lunch, etc.)
            $table->integer('table_number'); // Table number (1-12)
            $table->integer('people_count'); // Number of people
            $table->text('special_requests')->nullable(); // Optional special requests
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
