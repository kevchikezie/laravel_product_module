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
        $product = $this->products->create($request->only(['name', 'price', 'description']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('uploads'), $imageName);

            $product->productImage()->create(['name' => $imageName]);
        }

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function index()
    {
        $products = $this->products->with('productImage')->paginate();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->products->findOrFail($id);

        return view('products.show', compact('product'));
    }
}
