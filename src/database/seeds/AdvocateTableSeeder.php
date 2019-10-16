<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Advocate;

class AdvocateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arrAdvocates = [
["name" => "CONSULTA JURIS", "contact" => "22612233", "email" => "consulta@bom3.vsnl.net.in", "is_active" => true],
["name" => "FATIMA LAKDAWAL", "contact" => "9820775186", "email" => "Fatima.lakdawala85@gmail.com", "is_active" => true],
["name" => "GHASWALA & ASSOCIATES", "contact" => "9892432192", "email" => "Ghaswalaassociates@hotmail.cpm", "is_active" => true],
["name" => "GOENKA LAW & ASSOCIATES", "contact" => "22664817", "email" => "goenkalawassociates@yahoo.com", "is_active" => true],
["name" => "H & M LEGAL", "contact" => "9820443873", "email" => "hmlegal@gmail.com", "is_active" => true],
["name" => "HARSHADA KINIKAR", "contact" => "9869088890", "email" => "harshita_kinikar@hotmail.com", "is_active" => true],
["name" => "KOLI", "is_active" => true],
["name" => "M A KINI", "is_active" => true],
["name" => "M M K LAW", "contact" => "9869365532", "email" => "MORE.NANDAKUMAR@YAHOO.CO.IN", "is_active" => true],
["name" => "MANOJ KUMAR", "email" => "Adv.manojk@gmail.com", "is_active" => true],
["name" => "MARLYN MONTEIRO", "contact" => "9820300984", "email" => "merlynadvocate@gmail.com", "is_active" => true],
["name" => "MEDHA RANE ", "contact" => "9867268913", "email" => "medhasanjay@consultant.com", "is_active" => true],
["name" => "MR.RANJAN PILLAI", "contact" => "9819474838", "email" => "RANJAN.ADV@GMAIL.COM", "is_active" => true],
["name" => "PARANJPE", "contact" => "9324338468", "email" => "dspadv@vsni.net", "is_active" => true],
["name" => "PRADEEP SHUKLA", "contact" => "9082690244", "email" => "phshukla@reddiffmail.com", "is_active" => true],
["name" => "R J SINGH", "contact" => "9820337451", "email" => "rjsinghco@hotmail.com", "is_active" => true],
["name" => "RATINA MARVAH", "contact" => "22029999", "email" => "rathinamaravaraman@hotmail.com", "is_active" => true],
["name" => "SACHIN KOLI", "contact" => "9322910172", "email" => "adv_sachinkoli@rediffmail.com", "is_active" => true],
["name" => "SAI CONSULTANT", "contact" => "222262349", "email" => "saiconsultancy@consultant.com", "is_active" => true],
["name" => "SANTOSH SANJKAR", "is_active" => true],
["name" => "SHRIVASTAV & CO.", "is_active" => true],
["name" => "SSP LEAGAL", "is_active" => true],
["name" => "UTANGLE & CO.", "contact" => "22682027", "email" => "utangledgirish@yahoo.co.in", "is_active" => true],
["name" => "VINAYA CHAVAN", "contact" => "8291066057", "email" => "VINAYAJCHAVAN@GMAIL.COM", "is_active" => true],
["name" => "VIVEK SAWANT", "contact" => "9930210730", "email" => "Adv.viveksawant@gmail.com", "is_active" => true],
["name" => "VPG VALUERS & ENGINEERS", "contact" => "9921951600", "email" => "vpg177@gmail.com", "is_active" => true]];

        foreach ($arrAdvocates as $key => $value)
        {
            Advocate::create($value);
        }
}
}