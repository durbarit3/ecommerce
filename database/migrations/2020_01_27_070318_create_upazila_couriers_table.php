<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpazilaCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upazila_couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('upazila_id');
            $table->unsignedBigInteger('courier_id');
            $table->bigInteger('fee');
            $table->boolean('is_cash_on_delivery')->default(0);
            $table->timestamps();
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upazila_couriers');
    }
}
