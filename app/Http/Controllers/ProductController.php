<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productmodel;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Support\Facades\Date;

class ProductController extends Controller
{



    public function getlist()
    {
        return Productmodel::where('prd_visible', '1')->orderBy('id', 'desc')->get();
    }

    public function getlistdel()
    {
        return Productmodel::where('prd_visible', '0')->orderBy('id', 'desc')->get();
    }

    public function productdetail()
    {
        $id = $_GET['id'];
        $productDetail = Productmodel::find($id);
        return View('pages-home.product-detail', ['data' => $productDetail]);
        // return $productDetail;

    }

    public function addProduct(Request $request)
    {
        try {
            $data = array();
            $data['prd_name'] = $request->input('name');
            $data['prd_cate'] = $request->input('cate');
            $data['prd_price'] = $request->input('price');
            $data['prd_status'] = $request->input('status');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['prd_img'] = $request->file('img');
            DB::table('product')->insert($data);


            return response()->json([
                'success' => true,
                'product' => $data,
            ]);
        } catch (\Exception $e) {
            // Ghi lại thông báo lỗi vào file log
            \Log::error($e->getMessage());

            return response()->json([
                'datass' => $_POST,
                'success' => false,
                'message' => "Failed to add product",
            ]);
        }
        return $request;
    }
    public function getproducts()
    {
        $id = $_GET['id'];
        return Productmodel::where('id', $id)->get();
    }

    public function editProduct(Request $request)
    {
        try {
            $id = $_GET['id'];
            $data = array();
            $data['prd_name'] = $request->input('name');
            $data['prd_cate'] = $request->input('cate');
            $data['prd_price'] = $request->input('price');
            $data['prd_status'] = $request->input('status');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['prd_img'] = $request->file('img');
            DB::table('product')->where('id', $id)->update($data);


            return response()->json([
                'success' => true,
                'product' => $data,
                'id' => $id,
            ]);
        } catch (\Exception $e) {
            // Ghi lại thông báo lỗi vào file log
            \Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $data . "Failed to update product",
            ]);
        }
    }

    public function delproduct()
    {
        $data = array();
        $id = $_GET['id'];
        $data['prd_visible'] = '0';
        $data['delete_at'] = date('Y-m-d H:i:s');
        DB::table('product')->where('id', $id)->update($data);
    }

    public function restoreproduct()
    {
        $data = array();
        $id = $_GET['id'];
        $data['prd_visible'] = '1';
        DB::table('product')->where('id', $id)->update($data);
    }

    //client controller
    public function productsdetail()
    {
        return view('pages-home.product-detail');
    }


  
}
