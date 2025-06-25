<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{

    public function up(): void
    {
        Schema::create('documents', static function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
}
