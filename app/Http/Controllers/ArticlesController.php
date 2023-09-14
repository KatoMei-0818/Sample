<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index(Request $request) {
        //$articles = Article::latest('published_at')->latest('created_at')->published()->get();

        $tag_list = Tag::pluck('name', 'id');
        $articles = Article::query();
        $keytitle = $request->input('title');
        $keytag = $request->input('tag');
        $keyuser = $request->input('user');

        if(!empty($keytitle)) {
            $articles->where('title', 'LIKE', "%{$keytitle}%")->get();
        }

        if(!empty($keytag)) {
            
            $articles->whereHas('tags', function ($q)use($keytag) {
                $q->where('tags.name', 'LIKE',"%{$keytag}%");
                  })->get();
        }

        if(!empty($keyuser)) {
            
            $articles->whereHas('user', function ($q)use($keyuser) {
                $q->where('users.name', 'LIKE',"%{$keyuser}%");
                  })->get();
        }

        $posts = $articles->latest('published_at')->latest('created_at')->published()->get();

        return view('articles.index', compact('posts', 'tag_list'));
    }

    public function create()
    {
        $tag_list = Tag::pluck('name', 'id');

        return view('articles.create', compact('tag_list'));
    }
 
    public function show(Article $article) {
    
        return view('articles.show', compact('article'));
    }

    public function store(ArticleRequest $request) {
       

        $article = Auth::user()->articles()->create($request->validated());
        $article->tags()->attach($request->input('tags'));

        $article->user_id = $request->user()->id;

        return redirect()->route('dashboard')->with('message', '記事を追加しました。');
    }

    public function edit(Article $article) {
        $tag_list = Tag::pluck('name', 'id');

        return view('articles.edit', compact('article', 'tag_list'));
    }
 
    public function update(ArticleRequest $request, Article $article) {
 
        $article->update($request->validated());
        $article->tags()->sync($request->input('tags'));
 
        return redirect()->route('dashboard', [$article->id])->with('message', '記事を更新しました。');
    }

    public function destroy(Article $article) {
 
        $article->delete();
 
        return redirect()->route('dashboard')->with('message', '記事を削除しました。');
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function userpage($id)
    {   
        $articles = Article::query();

        $user = User::findOrFail($id);
        $keyuser = $user->name;

        $articles->whereHas('user', function ($q)use($keyuser) {
            $q->where('users.name', 'LIKE',"{$keyuser}");
              })->get();

        $posts = $articles->latest('published_at')->latest('created_at')->get();
              
        return view('articles.userpage', compact('posts', 'user'));
    }

    public function bookmark_articles()
    {
        $posts = Auth::user()->bookmark_articles()->latest('published_at')->latest('created_at')->published()->get();
    
        return view('articles.bookmarks', compact('posts'));
    }
}
