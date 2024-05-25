<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Category;
use App\Models\Portfolio;


class HomeController extends Controller
{
    public function index()
    {
        $services = Services::orderBy('created_at')->get();
        $categories = Category::all();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();

        return view('home', compact('services', 'categories', 'portfolios'));
    }
}
