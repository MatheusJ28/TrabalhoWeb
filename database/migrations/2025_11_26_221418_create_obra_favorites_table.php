<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('obra_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->string('obra_slug', 255);
            
            $table->foreign('obra_slug')->references('slug')->on('obras')->onDelete('cascade');
            
            $table->unique(['user_id', 'obra_slug']);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('obra_favorites');
    }
};