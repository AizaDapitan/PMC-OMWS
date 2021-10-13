<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->datetime('addedDate');
            $table->string('addedBy');
            $table->string('status');
            $table->string('contractor_id');
            $table->date('docDate');
            $table->string('location_id');
            $table->datetime('postedDate')->nullable();
            $table->string('postedBy')->nullable();
            $table->string('files');
            $table->string('mws');
            $table->string('approver');
            $table->string('receiver');
            $table->string('issuer');
            $table->string('transId');
            $table->integer('batch')->nullable();
            $table->string('rq')->nullable();
            $table->integer('seq');
            $table->text('remarks')->nullable();
            $table->string('editedby')->nullable();
            $table->datetime('datetimeedited')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
