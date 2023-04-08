<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\OderModel;
use App\Models\testModel;

class cartController extends Controller
{
    public function index()
    {
        return view('pages-home.cart');
    }
    public function checkout()
    {
        if (isset($_SESSION['login'])) {
            return view('pages-home.checkout');
        } else {
            return redirect('/signin');
        }
    }
    public function getcheckout(Request $request)
    {
        try {

            $ranid = rand(1000000, 9999999);
            $data = array();

            $data['id'] = $ranid;
            $data['id_user'] = $_SESSION['login']['id'];
            $data['order_price'] = $request->input('price');
            $data['user_name'] = $request->input('name');
            $data['user_email'] = $request->input('email');
            $data['user_phone'] = $request->input('phone');
            $data['user_adr'] = $request->input('adr');
            OderModel::insert($data);
            $products = [];
                for ($i = 0; $i < count($request->input('name_prd')); $i++) {
                    $product = [
                        'id_order' => $ranid,
                        'prd_name' => $request->input('name_prd')[$i],
                        'prd_price' => $request->input('price_prd')[$i],
                        'quantity' => $request->input('quantity')[$i]
                    ];
                    array_push($products, $product);
                
                testModel::insert($products);
            }
            


            return response()->json([
                'success' => true,
                'oder' => $products,
            ]);
        } catch (\Exception $e) {
            // Ghi lại thông báo lỗi vào file log
            \Log::error($e->getMessage());
        }
    }
}
