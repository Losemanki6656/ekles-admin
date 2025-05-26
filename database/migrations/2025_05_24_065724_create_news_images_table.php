<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsImagesTable extends Migration
{

    public function up(): void
    {
        Schema::create('news_images', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('news_images');
    }
}
