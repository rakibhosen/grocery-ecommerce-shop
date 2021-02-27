<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(PermissionTableSeeder::class);
  
        $this->call(CreateAdminUserSeeder::class);

    
        factory(App\User::class,1)->create();
        factory(App\Models\Category::class,1)->create();
        factory(App\Models\Brand::class,1)->create();
        factory(App\Models\Subcategory::class,1)->create();
        factory(App\Models\Product::class,10)->create();
        factory(App\Models\Color::class,1)->create();
        factory(App\Models\Size::class,1)->create();
    }
}
