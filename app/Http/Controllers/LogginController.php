<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class LogginController extends Controller
{
    public function index(){
        return View('pages-home.sign-up');
    }

    public function signin(){
        return View('pages-home.sign-in');
    }
    
}
