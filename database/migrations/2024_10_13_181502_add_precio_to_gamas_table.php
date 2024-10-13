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
        Schema::table('gamas', function (Blueprint $table) {
            //
            $table->double('precio', 8, 2)->after('gama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gamas', function (Blueprint $table) {
            //
            $table->dropColumn('precio');
        });
    }
};
