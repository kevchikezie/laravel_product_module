<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function __construct(private ProductService $productService) {}

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->create($request->only(['name', 'price', 'description']));

        if ($request->hasFile('image')) {
            $this->productService->uploadImage($product, $request->file('image'));
        }

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function index()
    {
        $products = $this->productService->allProducts();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productService->findProductById($id);

        return view('products.show', compact('product'));
    }
}
