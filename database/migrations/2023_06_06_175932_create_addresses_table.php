<?php

declare(strict_types=1);

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
        Schema::create('addresses', function (Blueprint $table) {
            // Table ids
            $table->id();
            $table->uuid('resource_id')->unique()->nullable(false);
            $table->unsignedBigInteger('customer_id')->unique();

            // Table main attributes
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('code')->nullable();

            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            // Foreign key field
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // Table timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};