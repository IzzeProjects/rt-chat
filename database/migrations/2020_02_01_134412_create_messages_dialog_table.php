<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesDialogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_dialog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->integer('dialog_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dialog_id')->references('id')->on('dialogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages_dialog');
    }
}
