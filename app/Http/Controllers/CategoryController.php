<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function getCategory()
    {
        try{
            $access_token = fopen("./storage/app/public/access_token.txt","r");
            $access_token = fgets($access_token);
            
    
            $retailer = fopen("./storage/app/public/retailer.txt","r");
            $retailer = fgets($retailer);
    
            $response = Http::withHeaders(
                [
                    'Retailer'=>$retailer,
                    'Authorization'=>'Bearer '.$access_token,
                    'Accept'=>'application/json',
                ]
            )->get('https://public.kiotapi.com/categories');

            $retailerid = Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.$access_token,
                'Accept' => 'application/json',
            ])->get('https://public.kiotapi.com/branches');

            $checkstatusretailer = $retailerid->status();
            $checkstatus = $response->status();
            if($checkstatus==200 && $checkstatusretailer==200)
            {
                $category = $response->json()['data'];
                $showRetailerid = $retailerid->json()['data'];
                
                  for( $i = 0;$i<1;$i++){
                    foreach($showRetailerid as $rtl){
                        $retailerid  = $rtl['retailerId'];

                    }
                  }
                 
                    
                
                return view('admin.category.listcategories',compact('category','showRetailerid','retailerid'));
            }
            else
            {
                return redirect()->back()->with('error','Kết nối thất bại!!!');
            }
        }
        catch(Exception $e)
        {
            echo "Cửa hàng hết hạn sử dụng";
        }
        
    }
    public function postCreateCategory(Request $request)
    {
        $retailer = fopen("./storage/app/public/retailer.txt","r");
        $retailer = fgets($retailer);

        $access_token = fopen("./storage/app/public/access_token.txt","r");
        $access_token = fgets($access_token);

        $response = Http::withHeaders(
            [
                'Retailer'=>$retailer,
                'Authorization'=>'Bearer '.$access_token,
                'Accept'=>'application/json',
            ]
        )->post('https://public.kiotapi.com/categories',
            [
                'categoryName'=>$request->categoryName,
                'retailerId'=>$request->retailerId,
            ]
        );
        $checkstatus = $response->status();
        $data = $response->json();
        if($checkstatus!=200 && isset($data['responseStatus']))
        {
            return redirect()->back()->with('error',$data['responseStatus']['message']);
        }else{
            return redirect()->back()->with('thongbao','Thêm thành công!!!');
        }
    }
    public function postUpdateCategory(Request $request,$id)
    {
        $retailer = fopen("./storage/app/public/retailer.txt","r");
        $retailer = fgets($retailer);

        $access_token = fopen("./storage/app/public/access_token.txt","r");
        $access_token = fgets($access_token);

        $response = Http::withHeaders(
            [
                'Retailer'=>$retailer,
                'Authorization'=>'Bearer '.$access_token,
                'Accept'=>'application/json',
            ]
        )->put('https://public.kiotapi.com/categories/'.$id,
            [
                'categoryName'=>$request->categoryName,
                'retailerId'=>$request->retailerId,
            ]
        );
        $checkstatus = $response->status();
        $data = $response->json();
        if($checkstatus!=200 && isset($data['responseStatus']))
        {
            return redirect()->back()->with('error',$data['responseStatus']['message']);
        }else{
            return redirect()->back()->with('thongbao','Cập nhật thành công!!!');
        }
    }
    public function getDeteleCategory($id)
    {
        $retailer = fopen("./storage/app/public/retailer.txt","r");
        $retailer = fgets($retailer);
        
        $access_token = fopen("./storage/app/public/access_token.txt","r");
        $access_token = fgets($access_token);

        $response = Http::withHeaders(
            [
                'Retailer'=>$retailer,
                'Authorization'=>'Bearer '.$access_token,
                'Accept'=>'application/json',
            ]
        )->delete('https://public.kiotapi.com/categories/'.$id);

        $checkstatus = $response->status();
        if($checkstatus==200)
        {
            return redirect()->back()->with('thongbao','Xóa thành công!!!');
        }else{
            return redirect()->back()->with('error','Xóa không thành công!!!');
        }

    }
}
