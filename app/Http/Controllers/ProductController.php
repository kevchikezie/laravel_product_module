<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function __construct(private Product $products) {}

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $this->products->create($request->validated());

        return redirect()->back()->with('success', 'Product created successfully.');
    }

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
