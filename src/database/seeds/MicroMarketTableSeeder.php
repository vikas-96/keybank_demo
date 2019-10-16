<?php

use Illuminate\Database\Seeder;
use App\Models\MicroMarket;
use App\Models\Asset;
class MicroMarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marketData = ['Airoli',
						'Andheri East',
						'Andheri West',
						'Balewadi',
						'Bandra',
						'Bandra West',
						'Bhandup West',
						'Bhayander East',
						'Bhiwandi',
						'Bhokarpada',
						'Byculla East',
						'Charni Road',
						'Chembur',
						'Chembur East',
						'Dadar And Nagar Haveli',
						'Dahisar East',
						'Deonar',
						'Gandhinagar',
						'Girgaon',
						'Goregaon East',
						'Goregaon West',
						'Govandi',
						'Hatfalia Mahidharpura',
						'Jalore',
						'Jogeshwari East',
						'Juhu',
						'Kalol',
						'Kalyan East',
						'Kandivali East',
						'Kandivali West',
						'Kanjurmarg',
						'Karol Baugh',
						'Kolhapur',
						'Kothade',
						'Kurla West',
						'Lamington Road',
						'Lonavala',
						'Malad East',
						'Malad West',
						'Mandvi',
						'Mira Road East',
						'Mulshi',
						'Nallasopara East',
						'Navi Mumbai',
						'Nerul',
						'Opera House',
						'Oshiwara',
						'Palghar',
						'Panvel',
						'Parel',
						'Powai',
						'Ranjangaon',
						'Sanand',
						'Sangli',
						'Santacruz East',
						'Santacruz West',
						'Savroli',
						'Shahapur',
						'Shirul',
						'Thane West',
						'Vasai',
						'Vasai East',
						'Village Chandivali',
						'Village Nangrargaon',
						'Virar East',
						'Virar West',
						'Worli'];
			try{
				foreach ($marketData as $key => $value)
			    {
			        $branch = MicroMarket::updateOrCreate(['name'=>$value]);

			        if(!is_null($branch))
			        {
			            $asset = Asset::where('address.micromarket','LIKE','%'.$value.'%')->first();

			            if(!is_null($asset))
			            {

			                $asset->update(['address.micromarket'=>$branch->id]);
			            }
			        }
			    }
			}catch(\Exception $e){
				dd($e);
	    	}
		}
}
