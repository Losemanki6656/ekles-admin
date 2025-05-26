<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawsTable extends Migration
{

    public function up(): void
    {
        Schema::create('laws', static function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laws');
    }
}
