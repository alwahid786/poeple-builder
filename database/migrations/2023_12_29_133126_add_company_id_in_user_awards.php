<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdInUserAwards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_awards', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable();
            $table->boolean('spin_type')->comment('0=normal,1=free')->default(0);
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
            $table->dropColumn('company_id');
            $table->dropColumn('spin_type');
        });
    }
}
