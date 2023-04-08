<?php

namespace App\Http\Controllers;

use App\Models\OderModel;
use Illuminate\Http\Request;
use App\Models\testModel;
use DB;


class OrderController extends Controller
{
    public function getoderuser()
    {
        return OderModel::where('id_user', $_SESSION['login']['id'])->get();
    }
    public function getoderoneuser()
    {
        return testModel::where('id_order', $_GET['id'])->get();
    }
    public function removeoderoneuser()
    {
        OderModel::where('id', $_GET['id'])->delete();
        testModel::where('id_order', $_GET['id'])->delete();
    }
    public function pricepermonth()
    {
        return OderModel::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(order_price) as total'))->whereYear('created_at', date('Y'))->groupBy('month')->get();
    }
}
