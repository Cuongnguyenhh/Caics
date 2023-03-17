<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productmodel;
use Facade\FlareClient\View;

class ProductController extends Controller
{
    public function getlist(){
        return Productmodel::orderBy('id','desc')->get();
        
    }
    public function addProduct(Request $request)
    {
        $name = $request->input('name');
        $cate = $request->input('cate');
        $price = $request->input('price');
    
        $img = $request->file('img'); // Lấy thông tin file hình ảnh
    
        if ($img) {
            $imageName = $img->store('../../../public/assets/img'); // Lưu trữ file hình ảnh vào thư mục public/images
        } else {
            $imageName = '';
        }
    
        // Lưu thông tin sản phẩm vào database
        $product = new Productmodel();
        $product->prd_name = $name;
        $product->prd_cate = $cate;
        $product->prd_price = $price;
        $product->prd_img = $imageName; // Lưu tên file hình ảnh vào database
        $product->save();
    
        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }
    
}
