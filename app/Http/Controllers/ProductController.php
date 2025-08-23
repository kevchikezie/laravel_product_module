<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function __construct(private Product $products) {}

    public function index()
    {
        $products = $this->products->paginate();

        return view('products.index', compact('products'));

    }

    public function show($id)
    {
        $product = $this->products->findOrFail($id);

        return view('products.show', compact('product'));
    }
}
