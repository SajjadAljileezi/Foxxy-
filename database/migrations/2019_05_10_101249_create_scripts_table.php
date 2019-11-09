<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scripts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('intro');
            $table->longText('local');
            $table->longText('google_map');
            $table->longText('organic');
            $table->longText('powerfull_website');
            $table->longText('review_managment');
            $table->longText('business_social_media');
            $table->longText('content');
            $table->longText('bing');
            $table->longText('yelp');
            $table->longText('apple_maps');
            $table->longText('adword');
            $table->longText('loop1');
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
        Schema::dropIfExists('scripts');
    }
}
