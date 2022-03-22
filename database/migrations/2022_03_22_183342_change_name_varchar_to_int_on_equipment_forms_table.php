<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ChangeNameVarcharToIntOnEquipmentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_forms', function (Blueprint $table) {
            DB::statement("alter table equipment_forms change name facility_user_id tinyint(4)NULL not NULL;");
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
            $table->varchar('name')->change();
        });
    }
}
