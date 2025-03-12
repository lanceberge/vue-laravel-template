<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('sent_free_month_email')->default(false);
        });

        DB::table('users')->update(['sent_free_month_email' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
