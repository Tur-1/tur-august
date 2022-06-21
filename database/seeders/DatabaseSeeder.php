<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $categories = [
            [
                'name' => Str::title('women'),
                'slug' => Str::slug('women'),
                'is_section' => 1,
            ]
        ];
        $brands = [
            [
                'name' => Str::title('Adidas'),
                'slug' => Str::slug('Adidas'),
                'image' => Str::slug('Adidas'),
            ]
        ];
        $colors = [
            [
                'name' => Str::title('black'),
                'slug' => Str::slug('black'),
                'image' => Str::slug('Adidas'),
            ]
        ];

        $size_options = [
            [
                'name' => Str::title('s'),
                'slug' => Str::slug('s'),
            ],
            [
                'name' => Str::title('m'),
                'slug' => Str::slug('m'),
            ],
            [
                'name' => Str::title('L'),
                'slug' => Str::slug('L'),
            ]
        ];
        $products = [
            [
                'name' => 'product 1',
                'slug' => Str::slug('product 1'),
                'details' => 'details',
                'information' => 'information',
                'price' => 234,
                'brand_id' => 1,
                'color_id' => 1,
            ]
        ];

        $product_images = [
            [
                'product_id' => 1,
                'image' => 'http://august.com/storage/images/products/product_5/22-02-22-13-13-24-1645535604-Screenshot-2021-07-23-132852.png',
                'is_main_image' => 1,
            ]
        ];
        $product_category = [
            [
                'product_id' => 1,
                'category_id' => 1,

            ]
        ];

        $product_size_options = [
            [
                'product_id' => 1,
                'size_id' => 1,
                'stock' => 9
            ],
            [
                'product_id' => 1,
                'size_id' => 2,
                'stock' => 6
            ],
            [
                'product_id' => 1,
                'size_id' => 3,
                'stock' => 4
            ]
        ];


        DB::table('categories')->insert($categories);
        DB::table('brands')->insert($brands);
        DB::table('colors')->insert($colors);
        DB::table('size_options')->insert($size_options);
        DB::table('products')->insert($products);
        DB::table('product_images')->insert($product_images);
        DB::table('product_category')->insert($product_category);
        DB::table('product_size_options')->insert($product_size_options);
    }
}