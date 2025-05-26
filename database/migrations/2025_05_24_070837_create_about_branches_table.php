<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutBranchesTable extends Migration
{

    public function up(): void
    {
        Schema::create('about_branches', static function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_branches');
    }
}
