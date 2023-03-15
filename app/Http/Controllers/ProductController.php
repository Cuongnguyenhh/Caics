<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productmodel;
class ProductController extends Controller
{
    public function getlist(){
        return Productmodel::orderBy('id','desc')->get();
      
      
        
    }
}
