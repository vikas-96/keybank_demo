<?php

use Illuminate\Database\Seeder;
use App\Models\Recoverybranch;

class RecoverybranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branchlist = ["State Bank Of India SAMB-MUMBAI-I", "State Bank Of India SAMB-MUMBAI-II", "State Bank Of India SAMB-MUMBAI-III", "State Bank of India SARB, Mumbai", "State Bank of India SARB, Pune", "State Bank of India SARB, Nagpur", "State Bank of India SARB,Thane", "State Bank of India SARB, Aurangabad", "State Bank of India, SAMRO Central, ", "State Bank of India, SARB, BHOPAL", "State Bank of India, SARB,Ahmedabad", "State Bank of India, SARB Indore", "State Bank of India, SARB  Jabalpur", "State Bank of India, SARB Raipur", "State Bank of India, SARB Gwalior", "State Bank of India, SARB Vadodara", "State  Bank Campus, SARB Bhilai", "State Bank Of India SAMB- BHOPAL", "State Bank of India, SAMRO South, Bangalore", "State  Bank Campus, SARB Banglore", "State Bank of India , SARB,, Chennai ", "State Bank of India , SARB,, Coimbatore", "State Bank of India , SARB,, Ernakulam", "State Bank of India , SARB,, Madurai", "State Bank of India, SARB, Hyderabad", "State Bank of India,SAMB,Banglore", "State Bank of India,SAMB,Chennai", "State Bank of India,SAMB,COIMBATORE", "State Bank of India,SAMB,Ernakulam", "State Bank of India,SAMB,Secunderabad", "State Bank of India, Stressed Assets Recovery Branch,  Vishakapatnam", "State Bank of India, Stressed Assets Recovery Branch, Trivendrum", "State Bank Of India SAMRO -NORTH", "State Bank of India, SAMB Ludhiana", "State Bank of India, SAMB, Chandigarh", "State Bank of India, SAMB, Lucknow ", "State Bank of India, SAMB, New Delhi ", "State Bank of India, SARB Amritsar,", "State Bank of India, SARB, Chandigarh", "State Bank of India, SARB, Allahabad", "State Bank of India, SARB, Delhi", "State Bank of India, SARB, Jammu", "State Bank of India, SARB Kanpur", "State Bank of India, SARB, Lucknow", "State Bank of India, SARB, Ludhiana", "State Bank of India, SARB, Srinagar", "State Bank of India, SARB, Varanashi ", "State Bank of India, SAMRO (East) ", "State Bank of India, SAMB Bhubaneswar", "State Bank of India, SAMB Kolkata-I", "State Bank of India, SAMB Patna", "State Bank of India, SARB Cuttack", "State Bank of India, SAMB Guwahati", "State Bank of India, SARB Kolkata", "State Bank of India, SARB Patna", "State Bank of India, SARB Ranchi", "State Bank of India, SARB Siliguri", "State Bank of India, SARB, Bhubaneswar", "State Bank of India, SAMB Kolkata-II", "State bank Of India-SARB Titaragh"];

    	foreach ($branchlist as $branch_name) {
    		Recoverybranch::create([
    			'branch_name' => $branch_name,
	        ]);
    	}
    }
}

