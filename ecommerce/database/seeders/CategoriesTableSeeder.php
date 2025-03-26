<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sản Phẩm Trang Điểm',
                'slug' => Str::slug('Sản Phẩm Trang Điểm'),
                'description' => 'Các sản phẩm trang điểm',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Chăm Sóc Cơ Thể',
                'slug' => Str::slug('Chăm Sóc Cơ Thể'),
                'description' => 'Các sản phẩm chăm sóc cơ thể',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Sản Phẩm Hỗ Trợ',
                'slug' => Str::slug('Sản Phẩm Hỗ Trợ'),
                'description' => 'Các sản phẩm hỗ trợ',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Thực Phẩm Y Tế, Thực Phẩm Chức Năng',
                'slug' => Str::slug('Thực Phẩm Y Tế, Thực Phẩm Chức Năng'),
                'description' => 'Các sản phẩm thực phẩm y tế và chức năng',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Thực Phẩm Dinh Dưỡng',
                'slug' => Str::slug('Thực Phẩm Dinh Dưỡng'),
                'description' => 'Các sản phẩm thực phẩm dinh dưỡng',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Sản Phẩm An Toàn Cho Mẹ Và Bé',
                'slug' => Str::slug('Sản Phẩm An Toàn Cho Mẹ Và Bé'),
                'description' => 'Các sản phẩm an toàn cho mẹ và bé',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

