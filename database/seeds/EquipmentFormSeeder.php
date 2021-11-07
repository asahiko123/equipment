<?php

use Illuminate\Database\Seeder;
use App\Models\EquipmentForm;

class EquipmentFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EquipmentForm::class,200)->create();
    }
}
