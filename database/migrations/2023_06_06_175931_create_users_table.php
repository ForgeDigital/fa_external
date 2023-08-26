<?php

declare(strict_types=1);

use Domain\User\Enums\UserStatus;
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
        Schema::create(table: 'users', callback: function (Blueprint $table) {
            // Table ids
            $table->id();
            $table->uuid(column: 'resource_id')->unique()->nullable(value: false);
            $table->unsignedInteger(column: 'country_id')->nullable();

            // Table main attributes
            $table->string(column: 'first_name')->nullable(value: false);
            $table->string(column: 'middle_name')->nullable();
            $table->string(column: 'last_name')->nullable(value: false);

            $table->string(column: 'gender')->nullable();
            $table->date(column: 'dob')->nullable();

            $table->string(column: 'phone')->unique()->nullable(value: false);
            $table->string(column: 'email')->unique()->nullable(value: false);

            $table->string(column: 'password');
            $table->string(column: 'avatar')->nullable();

            $table->string(column: 'status')->default(value: UserStatus::Pending->value);

            // Foreign key field
            $table->foreign(columns: 'country_id')->references(columns: 'id')->on(table: 'countries')->onDelete(action: 'cascade');

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
        Schema::dropIfExists(table: 'users');
    }
};
