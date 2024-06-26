<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrizesDetailsInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->double('monthly_budget')->default(500);
            $table->integer('grand_prize')->default(50)->comment('in percentage');
            $table->double('super_prize')->default(30)->comment('in percentage');
            $table->double('other_prize')->default(20)->comment('in percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('monthly_budget');
            $table->dropColumn('grand_prize');
            $table->dropColumn('super_prize');
            $table->dropColumn('other_prize');
        });
    }
}
