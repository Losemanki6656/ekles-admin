<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{

    public function up(): void
    {
        Schema::create('photos', static function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
}
