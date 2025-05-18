<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = Blog::query()->get();
        return view('project_1.customer.News.index', compact('news'));
    }
}   
