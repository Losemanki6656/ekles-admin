<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{

    public function up()
    {
        Schema::create('applications', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email_or_phone')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
