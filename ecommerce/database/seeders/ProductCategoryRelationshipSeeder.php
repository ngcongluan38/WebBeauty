<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryRelationshipSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Starting to fix product-category relationship...');

        // Get the products data type ID
        $dataTypeId = DB::table('data_types')
            ->where('name', 'products')
            ->value('id');

        if (!$dataTypeId) {
            $this->command->error('Products data type not found!');
            return;
        }

        // Find the relationship row
        $relationshipRow = DB::table('data_rows')
            ->where('data_type_id', $dataTypeId)
            ->where('field', 'product_belongsto_category_relationship')
            ->first();

        // Prepare the details JSON
        $details = [
            'model' => 'App\\Models\\Category',
            'table' => 'categories',
            'type' => 'belongsTo',
            'column' => 'category_id',
            'key' => 'id',
            'label' => 'name',
            'pivot_table' => 'categories',
            'pivot' => 0,
            'taggable' => 0
        ];

        if (!$relationshipRow) {
            // Create the relationship row if it doesn't exist
            $this->command->info('Creating product-category relationship...');
            
            DB::table('data_rows')->insert([
                'data_type_id' => $dataTypeId,
                'field' => 'product_belongsto_category_relationship',
                'type' => 'relationship',
                'display_name' => 'Category',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode($details),
                'order' => 11
            ]);
            
            $this->command->info('Relationship created successfully!');
        } else {
            // Update the existing relationship row
            $this->command->info('Updating existing product-category relationship...');
            
            DB::table('data_rows')
                ->where('id', $relationshipRow->id)
                ->update([
                    'details' => json_encode($details)
                ]);
                
            $this->command->info('Relationship updated successfully!');
        }

        // Make sure category_id field is properly configured
        $categoryIdRow = DB::table('data_rows')
            ->where('data_type_id', $dataTypeId)
            ->where('field', 'category_id')
            ->first();

        if ($categoryIdRow) {
            DB::table('data_rows')
                ->where('id', $categoryIdRow->id)
                ->update([
                    'browse' => 0,
                    'details' => json_encode([
                        'validation' => [
                            'rule' => 'nullable|exists:categories,id'
                        ]
                    ])
                ]);
                
            $this->command->info('Category ID field updated successfully!');
        } else {
            $this->command->info('Category ID field not found. Make sure it exists in your BREAD configuration.');
        }

        $this->command->info('Product-category relationship fix completed!');
    }
}

