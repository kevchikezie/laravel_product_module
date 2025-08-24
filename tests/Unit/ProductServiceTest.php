<?php

namespace Tests\Unit;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    private ProductService $productService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productService = new ProductService(new Product());
    }

    public function test_service_can_create_a_product(): void
    {
        $data = [
            'name' => 'Test Product',
            'price' => 200,
            'description' => 'Unit test product',
        ];

        $product = $this->productService->create($data);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertDatabaseHas('products', [
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
        ]);
    }

    public function test_service_can_upload_image_for_a_product(): void
    {
        $product = Product::factory()->create();

        $fakeImage = UploadedFile::fake()->image('product.jpg');

        $this->productService->uploadImage($product, $fakeImage);

        $this->assertDatabaseHas('product_images', [
            'product_id' => $product->id,
        ]);
    }

    public function test_service_can_return_paginated_products(): void
    {
        Product::factory()->count(5)->create();

        $products = $this->productService->allProducts();

        $this->assertInstanceOf(LengthAwarePaginator::class, $products);
        $this->assertCount(5, $products);
    }

    public function test_service_can_find_product_by_id(): void
    {
        $product = Product::factory()->create();

        $foundProduct = $this->productService->findProductById($product->id);

        $this->assertEquals($product->id, $foundProduct->id);
    }
}