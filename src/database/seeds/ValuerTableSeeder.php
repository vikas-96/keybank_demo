<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Valuer;

class ValuerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $arrValuer = [
            ["name" => "A V SHETTY & ASSOCIATES", "contact" => "2411 5420", "email" => "RTANKS@GMAIL.COM", "is_active" => true],
            ["name" => "AAKRUTEE CONSULTANCY", "contact" => "9969147587", "email" => "vipul.valuer@gmail.com", "is_active" => true],
            ["name" => "AARCH CONSULTANTS & VALUERS", "contact" => "9869003273", "email" => "aarchconsultants@gmail.com", "is_active" => true],
            ["name" => "ADEPT CONSULTANTS", "contact" => "2312658819", "email" => "1111@1111.com", "is_active" => true],
            ["name" => "AMOL BORA & CO", "contact" => "9422306698", "email" => "amolbora8@gmail.com", "is_active" => true],
            ["name" => "ARCHINOVA DESIGN INC", "contact" => "2225838990", "email" => "archinova@gmail.com", "is_active" => true],
            ["name" => "ARUN KUMAR GOYAL", "contact" => "9414135380", "email" => "arungoyal1947@gmail.com", "is_active" => true],
            ["name" => "ASHOK KADAM", "contact" => "9422400541", "email" => "kadam.ashok3@gmail.com", "is_active" => true],
            ["name" => "BASAVARAJ MASANAGI & CO. ", "contact" => "9322226236", "email" => "bmasanagi@gmail.com", "is_active" => true],
            ["name" => "DARSHANA GAJJAR REPORT", "contact" => "9825653054", "email" => "DARSHANA_VALUER@YAHOO.COM", "is_active" => true],
            ["name" => "DIWANJI & ASSOCIATES", "contact" => "6555 5230", "email" => "RDDIWANJIVALUERS@GMAIL.COM", "is_active" => true],
            ["name" => "DR AMIN SHAIKH", "contact" => "9028686786", "email" => "draminaashaikh@gmail.com", "is_active" => true],
            ["name" => "GIRISH PAWAR & ASSOCIATES", "contact" => "9892689989", "email" => "GIRISH_PAWAR2002@YAHOO.CO.IN", "is_active" => true],
            ["name" => "GYAN PRAKASH & CO", "contact" => "9769647444", "email" => "gyanprakash6@gmail.com", "is_active" => true],
            ["name" => "HARSHAD N DESHPANDE", "contact" => "9422287049", "email" => "HARSHADDESHPANDE68@GMAIL.COM", "is_active" => true],
            ["name" => "JOSHI CONSULTANTS", "contact" => "11111111", "email" => "WWW.JOSHICONSULTANTS.COM", "is_active" => true],
            ["name" => "KAKODE ASSOSIATES", "contact" => "9322226626", "email" => "KAKODE.ASSOCIATES@GMAIL.COM", "is_active" => true],
            ["name" => "KALBAG AND ASSOCIATES", "contact" => "9821108032", "email" => "gmkalbag@yahoo.co.in", "is_active" => true],
            ["name" => "KHANDEKAR", "contact" => "9322276196", "email" => "1111@1111.com", "is_active" => true],
            ["name" => "KISHORE KARAMSEY & CO", "contact" => "22874283", "email" => "KKC@KARAMSEY.COM", "is_active" => true],
            ["name" => "KOKATE ASSOCIATES", "contact" => "2224472040", "email" => "kokate.associates@gmail.com", "is_active" => true],
            ["name" => "KRISHNA CONSULTANTS", "contact" => "9324402500", "email" => "KISHANNEWWANI@GMAIL.COM", "is_active" => true],
            ["name" => "MULTI MULYANKAN INC", "contact" => "9427209992", "email" => "WWW.MMEASSOCATES.CO.N", "is_active" => true],
            ["name" => "MULYANKAN VALUATION 2226702917  mulyankan@vsnl.com", "is_active" => true],
            ["name" => "OZA ASSOCIATES", "contact" => "9619886595", "email" => "ozaassociate@rocketmail.com", "is_active" => true],
            ["name" => "P M PAI & ASSOCIATES", "contact" => "9822101990", "email" => "1111@1111.com", "is_active" => true],
            ["name" => "PERFECT VALUATION & CONSULTANT", "contact" => "9870031188", "email" => "perfectvaluations@gmail.com", "is_active" => true],
            ["name" => "PRABHAKAR IYER", "contact" => "7387094547", "email" => "PRABHAKARAYER@HOTMAIL.COM", "is_active" => true],
            ["name" => "PRAVIN KULKARNI AND ASSOCIATE", "contact" => "2251221005", "email" => "pravin.prka@gmail.com", "is_active" => true],
            ["name" => "R D ASHTAPUTRE", "contact" => "9869089652", "email" => "RDAVALUER@YAHOO.CO.IN", "is_active" => true],
            ["name" => "S D DESHPANDE", "contact" => "9594805666", "email" => "sanjaydeshpande63@gmail.com", "is_active" => true],
            ["name" => "SHAILESH KHANDWALA ", "contact" => "9824015917", "email" => "shaivee2001@yahoo.com", "is_active" => true],
            ["name" => "SHREE DUTT VALUER & ASSOCIATE", "contact" => "11111111", "email" => "sdva3@yahoo.in ", "is_active" => true],
            ["name" => "SIGMA ENGINEERING CONSULTANTS", "contact" => "2267991926", "email" => "info@sigmavaluers.com", "is_active" => true],
            ["name" => "SNA ARCHITECTS", "contact" => "9930212381", "email" => "SNAARCHITECTS@HOTMAIL.COM", "is_active" => true],
            ["name" => "T P KATEKAR", "contact" => "9769900702", "email" => "TPKATEKAR@GMAIL.COM", "is_active" => true],
            ["name" => "V S JODAN & CO VALUERS LLP", "contact" => "9769647444", "email" => "VSCJVALUER@GMAIL.COM", "is_active" => true],
            ["name" => "VASTUKALA", "contact" => "9870070121", "email" => "vastukala1@rediffmail.com", "is_active" => true],
            ["name" => "VPG VALUERS & ENGINEERS", "contact" => "9921951600", "email" => "vpg177@gmail.com", "is_active" => true]];
        foreach ($arrValuer as $key => $value)
        {
            Valuer::create($value);
        }
    }
}
