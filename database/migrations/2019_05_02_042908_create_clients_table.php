<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('closer_name');
            $table->string('name');
            $table->string('company');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->string('keywords');
            $table->string('packages');
            $table->string('city_campaign');
            $table->string('adword_phrases');
            $table->dateTime('adword_start')->nullable();
            $table->dateTime('adword_end')->nullable();
            $table->boolean('review_managment')->nullable()->default(false);
            $table->boolean('adword')->nullable()->default(false);
            $table->boolean('active')->nullable()->default(false);
            $table->boolean('facebook')->nullable()->default(false);
            $table->boolean('twitter')->nullable()->default(false);
            $table->boolean('ourwebsite')->nullable()->default(false);
            $table->boolean('is_call_back')->nullable()->default(false);
            $table->dateTime('call_back')->nullable();
            $table->dateTime('canceled_date')->nullable();
            $table->string('price');
            $table->longText('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
