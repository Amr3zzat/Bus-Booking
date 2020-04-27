<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation');
            $table->foreign('reservation')->references('id')
                ->on('reservations')->onDelete('cascade');
            $table->unsignedBigInteger('route');
            $table->foreign('route')->references('id')
                ->on('bus_routes')->onDelete('cascade');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_routes');
    }
}
