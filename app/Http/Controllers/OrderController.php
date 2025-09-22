<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Product $product, User $user)
    {
        $order = Order::all();
        return view('user.order', 
        [
            'product' => $product,
            'order' => $order,
            'user' => $user
        ]);
    }

    public function history(Product $product, User $user)
    {
        $orders = Order::where('user_id', auth()->id())->with('product')->paginate(10);
        $product = Product::all();
        return view('user.history', [
            'orders' => $orders,
            'product' => $product,
            'user' => $user
        ]);
    }

    public function showOrder()
    {
        $orders = Order::with('product', 'user')->paginate(10);
        return view('admin.dashboard', [
            'orders' => $orders,
            'title' => 'Dashboard'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'no_ktp' => 'required|string|max:16',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:20',
        ]);

        // Handle file upload
        $path = $request->file('foto_ktp')->store('ktp', 'public');
        
        //Ambil data product
        $product = Product::all();

        $produk = Product::findOrFail($request->product_id);
        $days = (new Carbon($request->start_date))->diffInDays(new Carbon($request->end_date)) + 1;
        $totalPrice = $days * $produk->price * 1.11; // Including 11% tax

        $order = new Order();
        $order->user_id = auth()->id();
        $order->product_id = $produk->id;
        $order->start_date = $request->start_date;
        $order->end_date = $request->end_date;
        $order->total_price = $totalPrice;
        $order->no_ktp = $request->no_ktp;
        $order->foto_ktp = $path;
        $order->address = $request->address;
        $order->phone_number = $request->phone_number;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->status = 'pending';
        $order->status_payment = 'unpaid';
        $order->save();

        // if ($order->wasRecentlyCreated) {
        //     dd('Order created successfully', $order);
        // } else {
        //     dd('Order creation failed');
        // }

        return redirect()->route('orders.history')->with('success', 'Pemesanan Berhasil! Silakan lanjutkan ke pembayaran.');
    }

    public function updateStatus (Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:confirmed,canceled',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status Pesanan Diperbarui');
    }
}
