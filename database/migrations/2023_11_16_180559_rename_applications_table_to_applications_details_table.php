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
        $from = 'applications';
        $to = 'applications_details';

        Schema::rename($from, $to);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
