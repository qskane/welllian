<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            WalletTableSeeder::class,
            TemplateTableSeeder::class,
            MediaTableSeeder::class,
            ArticleCategoriesTableSeeder::class,
            ArticlesTableSeeder::class

            /*
             * version product
            TagsTableSeeder::class,
            MallsTableSeeder::class,
            StoresTableSeeder::class,
            ProductsTableSeeder::class,
             */
        ]);

        cache()->clear();
    }
}
