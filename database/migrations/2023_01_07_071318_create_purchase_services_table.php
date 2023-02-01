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
        Schema::create('purchase_services', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->string('package_id');
            $table->string('service_id');
            $table->string('client_id');
            $table->integer('our_offer');
            $table->integer('duration');
            $table->string('purchased_date');
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
        Schema::dropIfExists('purchase_services');
    }
};
