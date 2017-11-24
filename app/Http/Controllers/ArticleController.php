<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Article;

class ArticleController extends Controller
{
    //列表
    public function index(){
        \Log::info("my_index", ['data'=>'xixi']);

        $article = Article::orderBy('created_at', 'desc')->paginate(10);

        return view("article/index", compact('article'));
    }

    //详情页面
    public function show(Article $article){
        
        return view("article/show", compact('article'));
    }

    //创建页面
    public function create(){

        return view("article/create");
    }

    //创建逻辑
    public function store(){
        // $article = new Article();
        // $article->title = request('title');
        // $article->content = request('content');
        // $article->save();

        //验证数据
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);

        //添加逻辑
        $result = Article::create(request(['title', 'content']));
        
        //视图渲染
        return redirect('/article');
    }

    //编辑页面
    public function edit(Article $article){

        return view("article/edit", compact('article'));
    }

    //编辑逻辑
    public function update(Article $article){
        //验证数据
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);
        //逻辑
        $article->title = request('title');
        $article->content = request('content');
        $article->save();
        //渲染
        return redirect("/article/{$article->id}");
    }

    //删除逻辑
    public function delete(Article $article){
        //TODO : 用户权限验证
        $article->delete();
        return redirect("/article");
    }

    //图片上传
    public function imageUpload(Request $request){
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
    }
}
