<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Proviences;
use App\Districts;
use App\Wards;

class ProductController extends Controller
{
    public function getProduct()
    {
        try{
            $access_token = fopen("../storage/app/public/access_token.txt", "r");
            $access_token=fgets($access_token);
            $retailer=fopen("../storage/app/public/retailer.txt", "r");
            $retailer=fgets($retailer);
            $response = Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.$access_token,
                'Accept' => 'application/json',
            ])->get('https://public.kiotapi.com/products');
            
            $product = $response->json()['data'];
           
            return view('admin.product.productlist',compact('product'));
        }catch(Exception $e)
        {
            echo "Cửa hàng đã hết thời gian sử dụng";
        }
    }
    public function getProductDetails($id)
    {
            $access_token = fopen("../storage/app/public/access_token.txt", "r");
            $access_token=fgets($access_token);
            $retailer=fopen("../storage/app/public/retailer.txt", "r");
            $retailer=fgets($retailer);
            $response = Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.$access_token,
                'Accept' => 'application/json',
            ])->get('https://public.kiotapi.com/products/'.$id);
            
            $details = $response->json();

            return view('admin.product.productdetails',compact('details'));
    }
    
           
            
       
        

    
}
