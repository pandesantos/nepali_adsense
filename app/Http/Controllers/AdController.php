<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\View;
use App\Adinfo;
use App\Calculation;
use App\Clientinfo;
use App\Appinfo;
use App\Click;
class AdController extends Controller
{
	public function getAdvertiser()
	{
		dd("cool");
	}
    public function getView($appId,$devId)
    {
    	

    	$row = Clientinfo::count();
    	$adSelector = mt_rand(1,$row); 
    	//dd($adSelector);
    	$view = View::where('app_id',$appId)->where('device_id',$devId)->where('ad_id',$adSelector)->first();// for same device and same app

    	$result_from_calc = Calculation::where('deviceId',$devId)->first();

    	if ($result_from_calc) 
    	{
    		$result_from_calc->update(['adId' => $adSelector]);
    	}
    	else
    	{
    		Calculation::create(['deviceId' => $devId, 'adId'=> $adSelector]);
    	}

    	if ($view) 
    	{
    		
    		
    		$current_time = Carbon::now();
    		$last_updated = $view->created_at;
    		$diff= $last_updated->diffInHours($current_time);
			$access_count = $view->access_count;

			 if($diff<24)
			 {
				if ($access_count <10) 
					{
						
				 		$access_count = $access_count+1;
				 		$view->update(['access_count'=>$access_count]);
				 		$adInfo = Adinfo::where('adId',$adSelector)->first();
    	    			$appInfo = Appinfo::where('appId',$appId)->first();
						
						if ($adInfo) 
				 		{
				 			$v_count = $adInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$adInfo->update(['vCount'=>$v_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'vCount' =>1]);
				 		}
				 		if ($appInfo) 
				 		{
				 			$v_count = $appInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$appInfo->update(['vCount' => $v_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'vCount'=>1]);
				 		}

				 		return view('ad.view')->with('app_id',$appId)->with('dev_id',$devId);
				 	}
			 		else
			 		{
			 		  return view('ad.view')->with('app_id',$appId)->with('dev_id',$devId);
					}
			}
			else
			{
				$access_count = 1;
				$v_count++;
				$created_at = date("Y-m-d H:i:s");
				View::update([
						       'access_count'=>$access_count,
						       'created_at'=>$created_at,
			 				   ])->where('ad_id',$adSelector);
				$adInfo->update([
								 'vCount' => $v_count
								]);
			 }
	    	
    	}
    	else
    	{
    		View::create([
    					  'app_id' => $appId, 
    					  'device_id' => $devId, 
    					  'ad_id' => $adSelector,
    					  'access_count' => 1
    					  ]);
				$adInfo = Adinfo::where('adId',$adSelector)->first();
    	 		$appInfo = Appinfo::where('appId',$appId)->first();
    	 				if ($adInfo) 
				 		{
				 			$v_count = $adInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$adInfo->update(['vCount'=>$v_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'vCount' =>1]);
				 		}

				 		if ($appInfo) 
				 		{
				 			$v_count = $appInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$appInfo->update(['vCount' => $v_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'vCount'=>1]);
				 		}
    		return view('ad.view')->with('app_id',$appId)->with('dev_id',$devId);
    	}
    }

    public function getClick($appId,$devId)
    {
    	$fromCalTable = Calculation::where('deviceId',$devId)->first();
    	$adSelector = $fromCalTable->adId;
    	$click = Click::where('app_id',$appId)->where('device_id',$devId)->where('ad_id',$adSelector)->first();// for same device and same app
    	if ($click) 
    	{
    		
    		
    		$current_time = Carbon::now();
    		$last_updated = $click->created_at;
    		$diff= $last_updated->diffInHours($current_time);
			$access_count = $click->access_count;

			 if($diff<24)
			 {
				if ($access_count <10) 
					{
						
				 		$access_count = $access_count+1;
				 		$click->update(['access_count'=>$access_count]);
				 		$adInfo = Adinfo::where('adId',$adSelector)->first();
    	    			$appInfo = Appinfo::where('appId',$appId)->first();
						
						if ($adInfo) 
				 		{
				 			$c_count = $adInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$adInfo->update(['cCount'=>$c_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'cCount' =>1]);
				 		}
				 		if ($appInfo) 
				 		{
				 			$c_count = $adInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$appInfo->update(['cCount' => $c_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'cCount'=>1]);
				 		}

				 		return view('ad.click')->with('app_id',$appId)->with('dev_id',$devId);
				 	}
			 		else
			 		{
			 		  return view('ad.click')->with('app_id',$appId)->with('dev_id',$devId);
					}
			}
			else
			{
				$access_count = 1;
				$c_count++;
				$created_at = date("Y-m-d H:i:s");
				Click::update([
						       'access_count'=>$access_count,
						       'created_at'=>$created_at,
			 				   ])->where('ad_id',$adSelector);
				$adInfo->update([
								 'cCount' => $c_count
								]);
			 }
	    	
    	}
    	else
    	{
    		Click::create([
    					  'app_id' => $appId, 
    					  'device_id' => $devId, 
    					  'ad_id' => $adSelector,
    					  'access_count' => 1
    					  ]);
				$adInfo = Adinfo::where('adId',$adSelector)->first();
    	 		$appInfo = Appinfo::where('appId',$appId)->first();
    	 				if ($adInfo) 
				 		{
				 			$c_count = $adInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$adInfo->update(['cCount'=>$c_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'cCount' =>1]);
				 		}

				 		if ($appInfo) 
				 		{
				 			$c_count = $appInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$appInfo->update(['cCount' => $c_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'cCount'=>1]);
				 		}
    		return view('ad.click')->with('app_id',$appId)->with('dev_id',$devId);
    	}
    }

   
}
