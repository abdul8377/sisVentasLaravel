<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        $this->call(CategorySeeder::class);

        Product::factory(50)->create();

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        //Usuarios y clientes
        $this->call(UserSeeder::class);
        //Categorias, productos y ventas


    }
}
