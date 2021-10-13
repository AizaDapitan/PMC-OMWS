<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_location', function (Blueprint $table) {
            $table->id();
            $table->integer('contractor_id');
            $table->integer('location_id');
            $table->boolean('isActive')->default(1);
            $table->string('addedBy');
            $table->string('removedBy')->nullable();
            $table->timestamp('addedDate')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('removeDate')->nullable();
            $table->boolean('isHidden')->default(0);
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
        Schema::dropIfExists('contractor_location');
    }
}
