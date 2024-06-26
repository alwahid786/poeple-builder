<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliedVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replied_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_reply_id');
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('user_id');
            $table->text('video_path')->nullable();
            $table->timestamps();
            $table->foreign('user_reply_id')->references('id')->on('replied_videos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('video_id')->references('id')->on('company_videos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replied_videos');
    }
}
