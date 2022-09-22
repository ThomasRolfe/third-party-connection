<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_integrations', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('display_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the integrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_migrations');
    }
};
