<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingCreatedByColumnToBloodCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_camps', function (Blueprint $table) {
            //
        });

        Schema::table('blood_camps', function (Blueprint $table) {           
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
        Schema::table('blood_camps', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
    }
}
