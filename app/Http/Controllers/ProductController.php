<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ProductCreatedEmail;
use Illuminate\Support\Facades\Mail;
class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        $request->validate([
    
            'name' => 'required|string',
    
            'description' => 'required|string',
    
            'price' => 'required|numeric',
    
            'status' => 'required|integer',
    
        ]);
    
    
        $product = Product::create($request->all());
    
    
        // Notify user about the new product
    
        $user = Auth::user();
    
        Mail::to($user->email)->send(new ProductCreatedEmail($product));
    
    
        return redirect('/products')->with('success', 'Product created successfully!');
    
    }
}

