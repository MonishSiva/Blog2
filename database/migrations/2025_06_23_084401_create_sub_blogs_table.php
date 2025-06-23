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
        Schema::create('sub_blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_blog_id');
            $table->string('heading');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

             $table->foreign('main_blog_id')->references('id')->on('main_blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_blogs');
    }
};
