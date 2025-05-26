<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadersTable extends Migration
{

    public function up(): void
    {
        Schema::create('leaders', static function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('position');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('leaders');
    }
}
