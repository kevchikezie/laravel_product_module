<?php 

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function __construct(private Product $product) {}

    public function create(array $data): Product
    {
        return $this->product->create($data);
    }

    public function uploadImage(Product $product, UploadedFile $image): void
    {
        try {
            $s3FilePath = Storage::disk('s3')->put('/', $image);

            $product->productImage()->create(['name' => $s3FilePath]);
        } catch (\Exception $e) {
            Log::error('Image upload failed: '.$e->getMessage());
        }
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