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
        Schema::create(table: 'countries', callback: function (Blueprint $table) {
            // Table ids
            $table->id();
            $table->uuid(column: 'resource_id')->unique()->nullable(value: false);

            // Table main attributes
            $table->string(column: 'name');
            $table->string(column: 'iso3');
            $table->string(column: 'iso2');
            $table->string(column: 'phone_code');
            $table->string(column: 'capital');
            $table->string(column: 'currency');
            $table->string(column: 'currency_symbol');
            $table->string(column: 'tld');
            $table->string(column: 'native')->nullable();
            $table->string(column: 'region');
            $table->string(column: 'subregion');
            $table->text(column: 'timezones');
            $table->text(column: 'translations')->nullable();
            $table->text(column: 'latitude');
            $table->text(column: 'longitude');
            $table->text(column: 'emoji');
            $table->text(column: 'emojiU');
            $table->string(column: 'status')->default(value: 'Active');
            $table->boolean(column: 'flag')->default(value: false);
            $table->text(column: 'wikiDataId')->nullable();

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'countries');
    }
};
