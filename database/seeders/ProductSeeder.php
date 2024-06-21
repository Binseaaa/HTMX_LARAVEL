<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Iphone',
                'description' => 'This is an iphone ',
                'price' => 100.00,
                'img' => 'https://powermaccenter.com/cdn/shop/files/iPhone_15_Pro_Max_Natural_Titanium_PDP_Image_Position-1__en-US_0da4d69a-853f-4060-a93e-df9b0aee24bf.jpg?v=1695860918',
            ],
            [
                'name' => 'MSI',
                'description' => 'This is a laptop',
                'price' => 300.00,
                'img' => 'https://images-cdn.ubuy.co.in/64c26fec557de751714a94c6-msi-gl63-gaming-laptop-15-6-intel-core.jpg',
            ],
            [
                'name' => 'Samsung',
                'description' => 'This is an phone',
                'price' => 500.00,
                'img' => 'https://images.samsung.com/is/image/samsung/assets/bd/2401/smartphones/galaxy-s24-ultra/specs/163x346_Titanium-Gray_Galaxy_S24_Ultra.jpg?$163_346_PNG$',
            ],
            [
                'name' => 'Colorful',
                'description' => 'This is a laptop',
                'price' => 1000.00,
                'img' => 'https://ph-test-11.slatic.net/p/da7209b3ad85b4f06e07e7fec1cf1e3f.jpg',
            ],
        ];

        foreach($products as $product) {
            Product::create($product);
        }
    }
}
