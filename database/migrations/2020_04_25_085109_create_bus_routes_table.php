<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus');
            $table->foreign('bus')->references('id')
                ->on('buses')->onDelete('cascade');
            $table->unsignedBigInteger('from');
            $table->foreign('from')->references('id')
                ->on('stations')->onDelete('cascade');
            $table->unsignedBigInteger('to');
            $table->foreign('to')->references('id')
                ->on('stations')->onDelete('cascade');
            $table->integer('order');
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
        Schema::dropIfExists('bus_routes');
    }
}
