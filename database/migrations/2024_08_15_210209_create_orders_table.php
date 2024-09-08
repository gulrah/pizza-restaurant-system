<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger by default
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->decimal('total', 8, 2);
            $table->string('status')->default('pending'); // Default status to 'pending'
            $table->integer('quantity');
            $table->string('product_name'); // Names of ordered products
            $table->string('email'); // User's email
            $table->string('address')->nullable(); // Add the address field
        $table->text('special_requests')->nullable(); // Add the special requests field
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
