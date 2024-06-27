<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product; // Assuming Product model exists
use App\Models\Brand;   // Assuming Brand model exists
use App\Models\Category; // Assuming Category model exists

class ApiRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_products()
    {
        $response = $this->getJson('/products');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_show_a_single_product()
    {
        $product = Product::factory()->create();

        $response = $this->getJson('/products/' . $product->id);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_brands()
    {
        $response = $this->getJson('/brands');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_show_a_single_brand()
    {
        $brand = Brand::factory()->create();

        $response = $this->getJson('/brands/' . $brand->id);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_products_by_brand()
    {
        $brand = Brand::factory()->create();

        $response = $this->getJson('/brands/' . $brand->name . '/products');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_categories()
    {
        $response = $this->getJson('/categories');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_show_a_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson('/categories/' . $category->id);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_products_by_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson('/categories/' . $category->name . '/products');

        $response->assertStatus(200);
    }
}
