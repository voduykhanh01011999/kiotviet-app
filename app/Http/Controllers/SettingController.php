<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SettingController extends Controller
{
    public function getConnect(){

        $client_id = fopen("../storage/app/public/client_id.txt","r");
        $client_id = fgets($client_id);
       
       
        $client_secret = fopen("../storage/app/public/client_secret.txt","r");
        
        $client_secret = fgets($client_secret);
       
        $retailer = fopen("../storage/app/public/retailer.txt","r");
        $retailer = fgets($retailer);

        $access_token = fopen("../storage/app/public/access_token.txt","r");
        $access_token = fgets($access_token);

        return view('admin.setting.connect',compact('client_id','client_secret','retailer','access_token'));

        
    }
    public function postConnect(Request $request)
    {
        $retailer=$request->retailer;
        $client_id=$request->client_id;
        $client_secret=$request->client_secret;

        $response=Http::asForm()->post('https://id.kiotviet.vn/connect/token',[
            'scopes'=>'PublicApi.Access',
            'grant_type'=>'client_credentials',
            'client_id'=>$client_id,
            'client_secret'=>$client_secret
        ]);
        
        if($response->status()==200){
            $check_retailer=Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.json_decode($response)->access_token,
            ])->get('https://public.kiotapi.com/categories');
        }
        
        if(($response->status()!=200) || ($check_retailer->status()!=200)){
            return back()->with('error','Thông tin nhập vào không hợp lệ');
        }
        $update=json_decode($response);
        $access_token=$update->access_token;

        Storage::put('public/retailer.txt',$retailer);
        Storage::put('public/client_id',$client_id);
        Storage::put('public/client_secret.txt',$client_secret);
        Storage::put("public/access_token.txt",$access_token);
        $access_token = fopen(storage_path("app/public/access_token.txt"),"r");
        return redirect()->back()->with('thongbao','Kết nối thành công đến cửa hàng');
    }
}
