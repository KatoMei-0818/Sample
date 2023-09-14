<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view("articles.index");
    }

    /*
    public function contact()
    {
        return view("contact");
    }
    */
}
