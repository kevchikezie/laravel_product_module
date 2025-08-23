<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function __construct(private Product $products) {}

    public function index()
    {
        return $this->products->paginate();
    }
}
