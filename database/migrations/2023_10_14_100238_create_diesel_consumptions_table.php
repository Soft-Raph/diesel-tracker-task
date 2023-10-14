<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDieselConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diesel_consumptions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('tank_capacity', 8, 2);
            $table->float('diesel_purchased', 8, 2);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Define foreign key constraint with the 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diesel_consumptions');
    }
}
