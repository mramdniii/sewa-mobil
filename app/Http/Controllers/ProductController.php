<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'), ['title' => 'Produk']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create', ['title' => 'Tambah Produk']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Handle file upload
        $path = $request->file('image')->store('uploads', 'public');

        $produk = new Product();
        $produk->name = $request->name;
        $produk->image = $path;
        $produk->description = $request->description;
        $produk->price = $request->price;
        $produk->stock = $request->stock;
        $produk->save();


        return redirect('/products')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $bebas)
    {
        return view('admin.products.single', [
            'title' => 'Detail Produk',
            'product' => $bebas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Product::findOrFail($id);

        return view('admin.products.edit', [
            'title' => 'Edit Produk',
            'product' => $edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $produk = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Handle file upload
            $path = $request->file('image')->store('uploads', 'public');
            $produk->image = $path;
        }
        
        $produk->name = $request->name;
        $produk->description = $request->description;
        $produk->price = $request->price;
        $produk->stock = $request->stock;
        $produk->save();


        return redirect('/products')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Product::findOrFail($id);

        if ($produk->image && Storage::disk('public')->exists($produk->image)) {
                Storage::disk('public')->delete($produk->image);
            }

        $produk->delete();

        return redirect('/products')->with('success', 'Data Berhasil Dihapus');

    }
}
