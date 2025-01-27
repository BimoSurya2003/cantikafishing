<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10000);
        return view('landing_page.kategori_produk',['products' => $products]);
    }
    
}
