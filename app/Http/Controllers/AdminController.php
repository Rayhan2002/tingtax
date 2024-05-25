<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Eager load the category relationship and order services by created_at
        $services = Services::with('category')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $portfolios = Portfolio::with('service')->orderBy('created_at', 'desc')->get();
        $contacts = Contact::all();

        return view('admin.index', compact('services', 'categories', 'portfolios', 'contacts'));
    }

}
