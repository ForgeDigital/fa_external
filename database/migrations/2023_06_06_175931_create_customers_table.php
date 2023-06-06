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
        Schema::create('customers', function (Blueprint $table)
        {
            // Table ids
            $table->id();
            $table->uuid('resource_id')->unique()->nullable(false);

            // Table main attributes
            $table->string('first_name')->nullable(false);
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable(false);

            $table->string('gender')->nullable();
            $table->date('dob')->nullable();

            $table->string('phone')->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);

            $table->string('avatar')->nullable();

            $table->boolean('verified')->default(false);
            $table->string('verified_by')->unique()->nullable();

            $table->string('password');

            $table->string('status')->default('Pending');
            $table->boolean('kyc_status')->default(false);

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
        Schema::dropIfExists('customers');
    }
};
