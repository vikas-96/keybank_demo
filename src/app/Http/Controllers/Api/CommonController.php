<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Banklist;
use App\Models\Recoverybranch;
use App\Models\LocationMaster;
use App\Models\Asset;

class CommonController extends Controller
{

    public function bankList($id = null){
        if($id != null){
            return Banklist::where('_id',$id)->pluck('bank_name','_id');    
        }
        return Banklist::pluck('bank_name','_id');
    }

    public function recoveryBranch($id = null){
        if($id != null){
            return Recoverybranch::where('_id',$id)->pluck('branch_name','_id');    
        }
        return Recoverybranch::pluck('branch_name','_id');
        
    }

    public function states($id = null){
        if($id != null){
            return LocationMaster::where('_id',$id)->pluck('state','_id'); 
        }
        return LocationMaster::where('type','state')->pluck('state','_id');
    }

    public function cities($stateid){
        $city = LocationMaster::whereIn('state_id',explode(',',$stateid))->where('type','city')->get();
    	return response()->json($city);
    }

    public function pincode($cityid){
        $pincode = Asset::whereIn('address.city',explode(',',$cityid))->pluck('address.pincode')->unique();
    	return response()->json($pincode);
    }

    public function allCommonData(){
        
        $banklist = $this->banklist();
        $branch = $this->recoveryBranch();
        $state = $this->states();

        $data = [
            'banklist'=>$banklist,
            'branch'=>$branch,
            'state'=>$state
        ];
        return response()->json($data);
    }

}
