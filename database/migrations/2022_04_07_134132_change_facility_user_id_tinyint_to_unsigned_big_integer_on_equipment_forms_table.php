<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFacilityUserIdTinyintToUnsignedBigIntegerOnEquipmentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('facility_user_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment_forms', function (Blueprint $table) {
            $table->tinyInteger('facility_user_id')->change();
        });
    }
}
