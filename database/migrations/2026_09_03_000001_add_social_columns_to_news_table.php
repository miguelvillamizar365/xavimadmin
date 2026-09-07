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
        Schema::table('news', function (Blueprint $table) {
            $table->string('InstagramUrl', 500)->nullable()->after('ImageUrl');
            $table->string('SpotifyUrl', 500)->nullable()->after('InstagramUrl');
            $table->string('FacebookUrl', 500)->nullable()->after('SpotifyUrl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['InstagramUrl', 'SpotifyUrl', 'FacebookUrl']);
        });
    }
};
