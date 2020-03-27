<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookKeepingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('book_keeping', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->enum('transaction_type', ['credit', 'debet'])->index('transaction_type');
            $table->date('transaction_date');
            $table->integer('day')->index('transaction_day');
            $table->integer('month')->index('transaction_month');
            $table->integer('year')->index('transaction_year');
            $table->decimal('amount', 9, 2);
            $table->text('description');
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
        Schema::dropIfExists('book_keeping');
    }
}
