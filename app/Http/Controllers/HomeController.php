<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::latest()->take(4)->get();
        return view('home', compact('product'));
    }

    public function indexUser()
    {
        $product = Product::latest()->take(4)->get();
        return view('user.home-user', compact('product'));
    }

    public function product()
    {
        $product = Product::all();
        return view('produk', compact('product'));
    }

    public function productUser()
    {
        $product = Product::all();
        return view('user.produk-user', compact('product'));
    }

    public function show(Product $product)
    {
        return view('detail', 
        [
            'product' => $product
        ]);
    }

    public function showUser(Product $product)
    {
        return view('user.detail-user', 
        [
            'product' => $product
        ]);
    }
}
