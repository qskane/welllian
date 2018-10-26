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
            ArticlesTableSeeder::class,
            \Encore\Admin\Auth\Database\AdminTablesSeeder::class,
            AdminMenuTableSeeder::class,

            WalletLogCategoryTableSeeder::class,
        ]);


        cache()->clear();
    }
}
