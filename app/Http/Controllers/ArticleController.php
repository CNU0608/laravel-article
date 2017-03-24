<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use App\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::latest()->published()->get();
        return view('article.article', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        if(is_null($article)){
            abort(404);
        }
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::pluck('name','id');
        // dd($tags);
        //为了在界面中显示标签name，id为了在保存文章的时候使用。
        return view('article.create',compact('tags'));
    }

    public function store(StoreArticleRequest $request)
    {
        $input = $request->all();
        //下面增加两行，顺便看看Request::get的使用
        $input['introdution'] = mb_substr($request->get('content'),0,64);
        /*$input['published_at'] = Carbon::now();
        Article::create($input);
        //return $input;
        return redirect('/');*/
        //dd($input);
        $article = Article::create($input);
        $article->tags()->attach($request->input('tag_list'));
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::pluck('name','id');
        return view('article.edit',compact('article','tags'));
    }

    public function update(StoreArticleRequest $request)
    {
        // 这里使用同样地验证规则
        // dd($request->all());

        // 根据id查询到需要更新的article
        $article = Article::find($request->get('id'));
        // 使用Eloquent的update()方法来更新，
        // request的except()是排除某个提交过来的数据，我们这里排除id
        $article->update($request->except('id'));
        // 跟attach()类似，我们这里使用sync()来同步我们的标签
        $article->tags()->sync($request->get('tag_list'));
        return redirect('/');
    }
}
