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
        Schema::create(table: 'addresses', callback: function (Blueprint $table) {
            // Table ids
            $table->id();
            $table->uuid(column: 'resource_id')->unique()->nullable(value: false);
            $table->unsignedBigInteger(column: 'user_id')->unique();

            // Table main attributes
            $table->string(column: 'address');
            $table->string(column: 'city');
            $table->string(column: 'state');
            $table->string(column: 'code')->nullable();

            $table->string(column: 'longitude')->nullable();
            $table->string(column: 'latitude')->nullable();

            // Foreign key field
            $table->foreign(columns: 'user_id')->references(columns: 'id')->on(table: 'users')->onDelete(action: 'cascade');

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
        Schema::dropIfExists(table: 'addresses');
    }
};
