<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RetailerController extends Controller
{
    public function getRetailer(){
        try{
            $access_token = fopen("../storage/app/public/access_token.txt", "r");
            $access_token=fgets($access_token);
            $retailer=fopen("../storage/app/public/retailer.txt", "r");
            $retailer=fgets($retailer);
            $response = Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.$access_token,
                'Accept' => 'application/json',
            ])->get('https://public.kiotapi.com/branches');
            
            $info = $response->json()['data'];
            return view('admin.retailer.inforetailer',compact('info','retailer'));
        }catch(Exception $e)
        {
            echo "Cửa hàng đã hết thời gian sử dụng";
        }
    }
}
