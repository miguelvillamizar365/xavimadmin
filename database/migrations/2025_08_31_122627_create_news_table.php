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
        Schema::create('news', function (Blueprint $table) {
            $table->id('NewsId');
            $table->string('Title');
            $table->text('Content');
            $table->string('Author', 100)->default('Admin');
            $table->string('ImageUrl', 500)->nullable();
            $table->string('Category', 100)->default('General');
            $table->boolean('IsPublished')->default(1);
            $table->foreignId('UserId')->constrained('users')->onDelete('cascade');
            $table->timestamps(); // creates CreatedAt & UpdatedAt automatically
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
