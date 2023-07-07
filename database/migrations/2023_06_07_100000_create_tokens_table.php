<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tokens', function (Blueprint $table) {
            // Table ids
            $table->id();
            $table->unsignedBigInteger('customer_id')->unique();

            // Table main attributes
            $table->string('email')->unique();
            $table->integer('token')->unique();
            $table->dateTime('token_expiration_date');

            // Foreign key field
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // Table timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
