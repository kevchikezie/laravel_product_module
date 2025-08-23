<?php 

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;

class ProductService
{
    public function __construct(private Product $product) {}

    public function create(array $data): Product
    {
        return $this->product->create($data);
    }

    public function uploadImage(Product $product, UploadedFile $image): void
    {
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads'), $imageName);

        $product->productImage()->create(['name' => $imageName]);
    }

    public function allProducts()
    {
        return $this->product->with('productImage')->paginate();
    }

    public function findProductById(int $id): ?Product
    {
        return $this->product->with('productImage')->findOrFail($id);
    }
}