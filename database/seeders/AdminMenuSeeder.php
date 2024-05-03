<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenuSeeder extends Seeder
{

    protected $data = [];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminMenu::whereRaw('1=1')->delete();

        $table = env('DB_PREFIX') . 'sites';
        $statement = "ALTER TABLE $table AUTO_INCREMENT = 1";
        DB::unprepared($statement);

        $this->addRow([
            'label' => 'Dashboard',
            'icon'  => 'bx bxs-dashboard',
            'route_name' => 'admin.dashboard',
        ]);

        $this->addRow([
            'label' => 'Slider',
            'icon'  => 'bx bxs-folder',
            'route_name' => 'admin.slider.index',
        ]);

        $this->addRow([
            'label' => 'Category',
            'icon'  => 'bx bxs-folder',
        ]);

        $this->addRow([
            'label' => 'Add New Category',
            'route_name' => 'admin.category.create',
        ], true);

        $this->addRow([
            'label' => 'View Categories',
            'route_name' => 'admin.category.index',
        ], true);

        $this->addRow([
            'label' => 'Trash',
            'route_name' => 'admin.category.index',
            'params' => [
                'type' => 'trash'
            ]
        ], true);

        $this->addRow([
            'label' => 'HSN/SAC',
            'icon'  => 'bx bxs-folder',
            'route_name' => 'admin.hsn.index'
        ]);

        $this->addRow([
            'label' => 'Colors',
            'icon'  => 'bx bxs-folder',
            'route_name' => 'admin.color.index'
        ]);

        $this->addRow([
            'label' => 'Product',
            'icon'  => 'bx bxs-folder',
        ]);

        $this->addRow([
            'label' => 'Add New Product',
            'route_name' => 'admin.product.create',
        ], true);

        $this->addRow([
            'label' => 'View Products',
            'route_name' => 'admin.product.index',
        ], true);

        $this->addRow([
            'label' => 'Trash',
            'route_name' => 'admin.product.index',
            'params' => [
                'type' => 'trash'
            ]
        ], true);

        // Stock Menu
        // $this->addRow([
        //     'label' => 'Stock',
        //     'icon'  => 'bx bxs-folder',
        // ]);

        // $this->addRow([
        //     'label' => 'Warehouse',
        //     'route_name' => 'admin.ware-house.index',
        // ], true);

        // $this->addRow([
        //     'label' => 'Add New Stock',
        //     'route_name' => 'admin.stock.create',
        // ], true);

        // $this->addRow([
        //     'label' => 'Transfer Stock',
        //     'route_name' => null // 'admin.stock.transfer',
        // ], true);

        // $this->addRow([
        //     'label' => 'View Stocks',
        //     'route_name' => 'admin.stock.index',
        // ], true);

        AdminMenu::insert($this->data);
    }

    protected function addRow($data, $hasParent = false)
    {
        $data['id'] = count($this->data) + 1;
        $data['admin_menu_id'] = $hasParent ? $this->getParent() : null;
        if (empty($data['icon'])) {
            $data['icon'] = null;
        }
        if (empty($data['route_name'])) {
            $data['route_name'] = null;
        }
        if (empty($data['params'])) {
            $data['params'] = [];
        }
        $data['params'] = json_encode($data['params']);
        $this->data[] = $data;
    }

    protected function getParent()
    {
        $parents = array_filter($this->data, function ($data) {
            return empty($data['admin_menu_id']);
        });

        $parents = array_values($parents);

        $lastParent = end($parents);

        return !empty($lastParent) ? $lastParent['id'] : null;
    }
}
