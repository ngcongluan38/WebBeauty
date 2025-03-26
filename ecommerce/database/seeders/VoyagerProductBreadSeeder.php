<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use Illuminate\Support\Facades\DB;

class VoyagerProductBreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if Products BREAD already exists
        $productDataType = DataType::where('name', 'products')->first();
        if ($productDataType) {
            $this->command->info('Products BREAD already exists. Removing it to create a fresh one.');
            
            // Remove existing data rows
            DataRow::where('data_type_id', $productDataType->id)->delete();
            
            // Remove data type
            $productDataType->delete();
        }

        //Create Data Type
        $dataType = DataType::firstOrNew(['name' => 'products']);
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural' => 'Products',
                'model_name' => 'App\\Models\\Product',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => 'Products for the e-commerce store',
                'server_side' => 0,
                'details' => json_encode([
                    'order_column' => 'created_at',
                    'order_display_column' => 'name',
                    'order_direction' => 'desc',
                    'default_search_key' => 'name',
                    'scope' => null,
                ]),
            ])->save();
        }

        // Create Data Rows
        $dataTypeId = $dataType->id;
        $this->createDataRows($dataTypeId);

        // Create Permissions
        $this->createPermissions('products');

        // Add to Menu
        $this->addToMenu('products', 'voyager-bag');

        $this->command->info('Products BREAD created successfully!');
    }

    /**
     * Create data rows for the products BREAD.
     *
     * @param int $dataTypeId
     * @return void
     */
    private function createDataRows($dataTypeId)
    {
        $rows = [
            // ID field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'id',
                'type' => 'number',
                'display_name' => 'ID',
                'required' => 1,
                'browse' => 1,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ],
            // Name field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'name',
                'type' => 'text',
                'display_name' => 'Name',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'required|max:255',
                    ],
                ]),
                'order' => 2,
            ],
            // Slug field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'slug',
                'type' => 'text',
                'display_name' => 'Slug',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'required|unique:products,slug,{{id}}',
                    ],
                    'slugify' => [
                        'origin' => 'name',
                        'forceUpdate' => true,
                    ],
                ]),
                'order' => 3,
            ],
            // Description field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'description',
                'type' => 'text_area',
                'display_name' => 'Description',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'nullable',
                    ],
                ]),
                'order' => 4,
            ],
            // Details field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'details',
                'type' => 'rich_text_box',
                'display_name' => 'Details',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'nullable',
                    ],
                ]),
                'order' => 5,
            ],
            // Image field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'image',
                'type' => 'image',
                'display_name' => 'Image',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'nullable|image',
                    ],
                    'resize' => [
                        'width' => 1000,
                        'height' => null,
                    ],
                    'quality' => 90,
                    'upsize' => true,
                ]),
                'order' => 6,
            ],
            // Price field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'price',
                'type' => 'number',
                'display_name' => 'Price',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'required|numeric|min:0',
                    ],
                    'display' => [
                        'id' => 'price',
                    ],
                ]),
                'order' => 7,
            ],
            // Original Price field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'original_price',
                'type' => 'number',
                'display_name' => 'Original Price',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'nullable|numeric|min:0',
                    ],
                    'display' => [
                        'id' => 'original_price',
                    ],
                ]),
                'order' => 8,
            ],
            // Featured field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'featured',
                'type' => 'checkbox',
                'display_name' => 'Featured',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'on' => 'Yes',
                    'off' => 'No',
                    'checked' => false,
                ]),
                'order' => 9,
            ],
            // Is Active field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'is_active',
                'type' => 'checkbox',
                'display_name' => 'Active',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'on' => 'Yes',
                    'off' => 'No',
                    'checked' => true,
                ]),
                'order' => 10,
            ],
            // Stock field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'stock',
                'type' => 'number',
                'display_name' => 'Stock',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'required|integer|min:0',
                    ],
                ]),
                'order' => 11,
            ],
            // SKU field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'sku',
                'type' => 'text',
                'display_name' => 'SKU',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'nullable|max:100',
                    ],
                ]),
                'order' => 12,
            ],
            // Category ID field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'category_id',
                'type' => 'number',
                'display_name' => 'Category ID',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'nullable|exists:categories,id',
                    ],
                ]),
                'order' => 13,
            ],
            // Created At field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => 'Created At',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 14,
            ],
            // Updated At field
            [
                'data_type_id' => $dataTypeId,
                'field' => 'updated_at',
                'type' => 'timestamp',
                'display_name' => 'Updated At',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 15,
            ],
            // Category Relationship
            [
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
                'details' => json_encode([
                    'model' => 'App\\Models\\Category',
                    'table' => 'categories',
                    'type' => 'belongsTo',
                    'column' => 'category_id',
                    'key' => 'id',
                    'label' => 'name',
                    'pivot_table' => 'categories',
                    'pivot' => 0,
                ]),
                'order' => 16,
            ],
        ];

        // Create each data row
        foreach ($rows as $rowData) {
            $row = DataRow::firstOrNew([
                'data_type_id' => $dataTypeId,
                'field' => $rowData['field'],
            ]);

            if (!$row->exists) {
                $row->fill($rowData)->save();
                $this->command->info("Created data row: {$rowData['field']}");
            } else {
                $this->command->info("Data row already exists: {$rowData['field']}");
            }
        }
    }

    /**
     * Create permissions for a given table.
     *
     * @param string $table
     * @return void
     */
    private function createPermissions($table)
    {
        $permissions = [
            "browse_{$table}",
            "read_{$table}",
            "edit_{$table}",
            "add_{$table}",
            "delete_{$table}",
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['key' => $permission, 'table_name' => $table]);
            $this->command->info("Permission '{$permission}' created or already exists");
        }

        // Assign permissions to admin role
        $role = DB::table('roles')->where('name', 'admin')->first();
        if ($role) {
            foreach ($permissions as $permission) {
                $permissionId = DB::table('permissions')->where('key', $permission)->value('id');
                
                // Check if permission is already assigned to role
                $exists = DB::table('permission_role')
                    ->where('permission_id', $permissionId)
                    ->where('role_id', $role->id)
                    ->exists();
                
                if (!$exists && $permissionId) {
                    DB::table('permission_role')->insert([
                        'permission_id' => $permissionId,
                        'role_id' => $role->id,
                    ]);
                    $this->command->info("Permission '{$permission}' assigned to admin role");
                }
            }
        }
    }

    /**
     * Add a menu item for the given table.
     *
     * @param string $table
     * @param string $icon
     * @return void
     */
    private function addToMenu($table, $icon)
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();
        
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => ucfirst($table),
            'url' => '',
            'route' => "voyager.{$table}.index",
        ]);
        
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => $icon,
                'color' => null,
                'parent_id' => null,
                'order' => 99,
            ])->save();
            
            $this->command->info("Menu item for '{$table}' created");
        } else {
            $this->command->info("Menu item for '{$table}' already exists");
        }
    }
}

