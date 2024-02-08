<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {


        return view('pages.promo');
    }
}