<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCreatedByToCampScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camp_schedule', function (Blueprint $table) {
            $table->integer('created_by')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camp_schedule', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
    }
}
