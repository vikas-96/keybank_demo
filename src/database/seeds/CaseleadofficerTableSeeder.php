<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Caseleadofficer;

class CaseleadofficerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arrCaseLeadOfficer = [
        ["name" => "VINOD SAWADKAR", "contact" =>9819246696, "email" => "VINOD.SAWADKAR@SBI.CO.IN", "is_active" => true],
        ["name" => "SANDU BORDE", "contact" =>9970135009, "email" => "ST.BORDE@SBI.CO.IN", "is_active" => true],
        ["name" => "ABHAY SOMKUWAR", "contact" =>8275130684, "email" => "A.SOMKUWAR@SBI.CO.IN", "is_active" => true]];
        foreach ($arrCaseLeadOfficer as $key => $value)
        {
            Caseleadofficer::create($value);
        }
    }
}
