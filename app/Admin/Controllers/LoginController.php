<?php

namespace App\Admin\Controllers;

class LoginController extends Controller{

    //admin登录页
    public function index(){
        
        return view('admin.login.index');
    }

    //admin登录逻辑
    public function login(){
        
    }

    //admin登出逻辑
    public function logout(){
        
    }

}