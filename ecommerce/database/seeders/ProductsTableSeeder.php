<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();
        
        $products = [
            [
                'name' => 'Vision Lutein Vline Malaysia Tăng Cường Thị Lực',
                'slug' => Str::slug('Vision Lutein Vline Malaysia Tăng Cường Thị Lực'),
                'description' => 'Sản phẩm tốt cho mắt và thị lực',
                'price' => 689000,
                'original_price' => 999000,
                'is_active' => true,
                'stock' => 100,
                'category_id' => $categoryIds[3], // Thực Phẩm Chức Năng
            ],
            [
                'name' => 'Cao ho Hoàng Bảo Đan hết ho, tiêu đờm, bổ phế',
                'slug' => Str::slug('Cao ho Hoàng Bảo Đan hết ho, tiêu đờm, bổ phế'),
                'description' => 'Sản phẩm hỗ trợ điều trị ho',
                'price' => 220000,
                'original_price' => null,
                'is_active' => true,
                'stock' => 100,
                'category_id' => $categoryIds[3], // Thực Phẩm Chức Năng
            ],
            [
                'name' => 'Bột Hỗ Trợ Giảm Cân, Đẹp Da Quiari Shake Hương Vị Sữa Dừa',
                'slug' => Str::slug('Bột Hỗ Trợ Giảm Cân, Đẹp Da Quiari Shake Hương Vị Sữa Dừa'),
                'description' => 'Sản phẩm hỗ trợ giảm cân và làm đẹp da',
                'price' => 1849000,
                'original_price' => 2000000,
                'is_active' => true,
                'stock' => 100,
                'category_id' => $categoryIds[2], // Sản Phẩm Hỗ Trợ
            ],
            [
                'name' => 'Gel Tắm Nước Hoa Nữ MINE Stay Magical Perfume Shower Gel',
                'slug' => Str::slug('Gel Tắm Nước Hoa Nữ MINE Stay Magical Perfume Shower Gel'),
                'description' => 'Sản phẩm tắm với hương thơm nước hoa',
                'price' => 339000,
                'original_price' => null,
                'is_active' => true,
                'stock' => 100,
                'category_id' => $categoryIds[1], // Chăm Sóc Cơ Thể
            ],
            [
                'name' => 'Bọt Rửa Tay Khô Diệt Khuẩn Foam Soap Arenia 250ml',
                'slug' => Str::slug('Bọt Rửa Tay Khô Diệt Khuẩn Foam Soap Arenia 250ml'),
                'description' => 'Sản phẩm rửa tay diệt khuẩn',
                'price' => 229000,
                'original_price' => null,
                'is_active' => true,
                'stock' => 100,
                'category_id' => $categoryIds[1], // Chăm Sóc Cơ Thể
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

