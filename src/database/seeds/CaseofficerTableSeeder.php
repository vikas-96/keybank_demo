<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Caseofficer;

class CaseofficerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arrCaseOfficer = [
            ["name" => "ASHWINI HALDANKAR", "contact" =>9969450240, "email" => "ASHWINI.HALDANKAR@SBI.CO.IN","is_active" => true],
            ["name" => "RICHA NIMONKAR", "contact" =>9004699378, "email" => "RICHA.NAGARE@SBI.CO.IN","is_active" => true],
            ["name" => "ANJANI PATIL", "contact" =>9702718032, "email" => "ANJANI.PARAB@SBI.CO.IN","is_active" => true],
            ["name" => "S C SARASWAT", "contact" =>9833817616, "email" => "SUBHASH.SARASWAT@SBI.CO.IN","is_active" => true],
            ["name" => "GAYATRI MASBOINWAR", "contact" =>9579589768, "email" => "GAYATRI.MASBOINWAR@SBI.CO.IN","is_active" => true],
            ["name" => "S B PATEL", "contact" =>9004693219, "email" => "SB.PATEL@SBI.CO.IN","is_active" => true],
            ["name" => "SHOBHA CHAUDHARY", "contact" =>9833016155, "email" => "SHOBHA.CHAUDHARY@SBI.CO.IN","is_active" => true],
            ["name" => "H L ALGOTAR", "contact" =>9833554226, "email" => "HARSHAD.ALGOTAR@SBI.CO.IN","is_active" => true],
            ["name" => "BHARAT MOON", "contact" => 8422968844, "email" =>" BHARAT.MOON@SBI.CO.IN","is_active" => true]
        ];
        foreach ($arrCaseOfficer as $key => $value)
        {
            Caseofficer::create($value);
        }
    }
}
