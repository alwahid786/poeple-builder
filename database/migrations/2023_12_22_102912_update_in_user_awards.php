<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInUserAwards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_awards', function (Blueprint $table) {
            $table->dropForeign(['award_id']);
             $table->dropColumn('award_id');
             $table->double('price')->nullable();
             $table->string('reward_type')->nullable();
             $table->string('status')->default('Pending')->comment('Pending,Received');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_awards', function (Blueprint $table) {

            $table->unsignedBigInteger('award_id');
            $table->foreign('award_id')->references('id')->on('awards')->onDelete('cascade')->onUpdate('cascade');
            $table->dropColumn('price');
            $table->dropColumn('status');
            $table->dropColumn('reward_type');
        });
    }
}
