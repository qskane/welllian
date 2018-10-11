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
        $this->call([
            UsersTableSeeder::class,
            WalletTableSeeder::class,
            TemplateTableSeeder::class,
            MediaTableSeeder::class,
            /*
             * version product
            TagsTableSeeder::class,
            MallsTableSeeder::class,
            StoresTableSeeder::class,
            ProductsTableSeeder::class,
             */
        ]);

    }
}
