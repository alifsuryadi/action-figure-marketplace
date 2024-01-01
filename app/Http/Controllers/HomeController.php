<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->get();  // dengan function relasi di model
        // $products = Product::with(['galleries'])->take(12)->latest()->get(); // gambar terbaru

        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}