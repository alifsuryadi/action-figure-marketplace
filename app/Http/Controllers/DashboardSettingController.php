<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        
        $products = Product::with(['galleries', 'category'])
                        ->where('users_id', Auth::user()->id)
                        ->get();
                
        return view('pages.dashboard-settings', [
            'user' => $user,
            'categories' => $categories,
            'products' =>  $products
        ]);
    }

    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account',[
            'user' => $user
        ]);
    }

    public function update(Request $request, string $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}