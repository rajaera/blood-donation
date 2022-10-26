<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            

            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            

            $table->string('address1', 50);
            $table->string('address2', 50)->nullable();
            $table->string('address3', 50)->nullable();
            $table->string('city', 50)->nullable();

            $table->string('contact_number', 12);
            $table->string('identity_number', 15);

            $table->string('gender', 6);

            $table->integer('source_id')->nullable();
            $table->integer('donation_camp_id');

            $table->softDeletes();
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
        Schema::dropIfExists('donors');
    }
}
