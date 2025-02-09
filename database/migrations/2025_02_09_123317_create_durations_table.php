<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('durations', function (Blueprint $table) {
            $table->id('durationID');
            $table->string('durationName'); // Example: "3 Months", "6 Months", "1 Year"
            $table->integer('months'); // Number of months (e.g., 3, 6, 12)
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('durations');
    }
};
