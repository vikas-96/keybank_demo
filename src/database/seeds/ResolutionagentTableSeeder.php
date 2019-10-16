<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Resolutionagent;

class ResolutionagentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arrResolutionAgent = [["name" => "A J ASSOCIATE", "contact" => "9324882896", "email" => "ajrecovery9@gmail.com", "is_active" => true],
["name" => "ABRAM ENFORCEMENT & RECOVERY SERVICES", "contact" => "9867714142", "email" => "cherao@gmail.com", "is_active" => true],
["name" => "ADHIKRUT JAPTI VASULI", "contact" => "28629999", "email" => "jabti@vasuli.com", "is_active" => true],
["name" => "ARCK", "contact" => "9892333340", "email" => "finvishal@yahoo.com", "is_active" => true],
["name" => "ARMS", "contact" => "11111111", "email" => "1111@1111.com", "is_active" => true],
["name" => "CAPTAIN CONSULTANCY SERVICES", "contact" => "8600013855", "email" => "captainconsultancy@gmail.com", "is_active" => true],
["name" => "CAPTION CONSULTANCY", "contact" => "8600013855", "email" => "CAPTIONCONSULTANCY@GMAIL.COM", "is_active" => true],
["name" => "DYNAMIC SOLUTIONS", "contact" => "9892378210", "email" => "DYNAMICSOLUTION1305@GMAIL.COM", "is_active" => true],
["name" => "INVENT ARK", "contact" => "022-66324052", "email" => "NVENT.ARC.PVT.LTD@GMAIL.COM", "is_active" => true],
["name" => "JVD", "contact" => "3299 7884", "email" => "JVDMUMBAI@YAHOO.COM", "is_active" => true],
["name" => "M A ASSOCIATES", "contact" => "7507078288", "email" => "MAASSOCIATESMUMBAI@GMAIL.COM", "is_active" => true],
["name" => "MADATED ASSETS POSSESSION & SOLUTIONS PVT LTD", "contact" => "7498996888", "email" => "MAPSRECOVERY@GMAIL.COM", "is_active" => true],
["name" => "WINNER RECOVERY SOLUTIONS LTD (R.M.SURVE)", "contact" => "9819744522", "email" => "WINNER.RECOVERYSOLUTIONS@GMAIL.COM", "is_active" => true],
["name" => "NPA FINANCIAL", "contact" => "8805471245", "email" => "NPAFS.NGP@GMAIL.COM", "is_active" => true],
["name" => "OM ENTERPRISES", "contact" => "9892507818", "email" => "SANJAY.GADKAR@YAHOO.COM", "is_active" => true],
["name" => "PJ PROPERTIES", "contact" => "9004530657", "email" => "PJPROPERTIES@GMAIL.COM", "is_active" => true],
["name" => "RK ASSOCIATE", "contact" => "9820479713", "email" => "Rkrcovery.in@gmail.com", "is_active" => true],
["name" => "SUKOBA", "contact" => "9769426777", "email" => "sukoballp@gmail.com", "is_active" => true],
["name" => "THAKKAR AUCTIONER & REALTORS", "contact" => "9324541883", "email" => "Thakkar.thakkar703@gmail.com", "is_active" => true],
["name" => "VIVRO FINANCIAL SERVICES P LTD", "email" => "66668040", "email" => "mumbai@vivro.net", "is_active" => true],
["name" => "NO RESOLUTION AGENT", "contact" => "11111111", "email" => "1111@1111.com", "is_active" => true]];
    foreach ($arrResolutionAgent as $key => $value)
        {
            Resolutionagent::create($value);
        }
    }
}
