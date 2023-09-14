<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {   
        $articles = Article::query();
        $keyuser = Auth::user()->name;

        $articles->whereHas('user', function ($q)use($keyuser) {
            $q->where('users.name', 'LIKE',"{$keyuser}");
              })->get();

        $posts = $articles->latest('published_at')->latest('created_at')->get();
              

        return view('dashboard', compact('posts', 'keyuser'));
    }
}
