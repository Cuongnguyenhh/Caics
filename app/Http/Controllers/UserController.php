<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModal;
class UserController extends Controller
{

    public function getusernone(){
        return UserModal::orderBy('name', 'desc')->where('status','1')->get();

    }
    public function themmang(Request $request){
        $id = $request->input('id');
        UserModal::where('id', $id)->update(['status' => 1]);

    }
    public function xoamang(Request $request){
        $id = $request->input('id');
        UserModal::where('id', $id)->update(['status' => 0]);

    }
    
    public function getuser(){

     return UserModal::orderBy('name', 'desc')->where('status','0')->get();
 
     }
     public function getadd(Request $request){
        $data = array();
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = MD5($request->input('pass'));

        UserModal::insert($data);

     }
     public function login(Request $request){
       $email = $request->input('email');
        $pass = MD5($request->input('password'));   
        $check = UserModal::where('email', $email)->where('password', $pass)->first();
        if($check){
            $userinfo = $check->getAttributes();
            $_SESSION['login'] = $userinfo;
            
            if ($_SESSION['login']['rule'] == '1') {
                header("location:./");
            } else {
                header("location:./dashboard");
            }
            return response()->json(['user' => $check, 'message' => 'Login successful'], 200);

        }else{
            return response()->json(['message' => 'Login failed']);
        }
     }
     public function check(){
        var_dump($_SESSION);
     }
     public function logout(){
        unset($_SESSION['login']);
        header("location: http://phucuong.net/caics/");
        exit();
     }
     public function deluser(Request $request){
        $user = $request->input('user');

        UserModal::where('id', $user)->delete();

     }
     public function getedituser(Request $request){
        $data = array();
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $id = $request->input('id');
        UserModal::where('id', $id)->update($data);
        return response()->json(['datas' => $data]);

     }
 }   
