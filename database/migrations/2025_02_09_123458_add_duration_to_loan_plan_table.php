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
        Schema::table('loan_plan', function (Blueprint $table) {
            $table->string('duration')->after('Penalty'); // Example: "3 Months", "6 Months", "1 Year"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_plan', function (Blueprint $table) {
            //
        });
    }
};
