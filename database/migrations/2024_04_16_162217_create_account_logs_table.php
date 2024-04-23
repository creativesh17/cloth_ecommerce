<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_category_id')->nullable();
            $table->float('amount')->unsigned()->nullable();
            $table->string('amount_in_text')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['income', 'expense'])->default('income');
            $table->tinyInteger('is_approved')->default(1);            
            $table->tinyInteger('status')->default(1);           
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
        Schema::dropIfExists('account_logs');
    }
}
