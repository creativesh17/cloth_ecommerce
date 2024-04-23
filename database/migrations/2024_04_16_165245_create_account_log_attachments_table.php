<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountLogAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_log_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_category_id')->nullable();
            $table->unsignedBigInteger('account_log_id')->nullable();
            $table->string('file')->nullable();
            $table->tinyInteger('is_approved')->default(1);
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
        Schema::dropIfExists('account_log_attachments');
    }
}
