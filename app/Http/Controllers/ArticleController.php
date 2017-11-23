<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //列表
    public function index(){

        return view("article/index");
    }

    //详情页面
    public function show(){
        
        return view("article/show");
    }

    //创建页面
    public function create(){

        return view("article/create");
    }

    //创建逻辑
    public function store(){

    }

    //编辑页面
    public function edit(){

        return view("article/edit");
    }

    //编辑逻辑
    public function update(){
        
    }

    //删除逻辑
    public function delete(){

    }

}
