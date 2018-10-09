<?php

use Illuminate\Database\Seeder;

class StoresTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Tag::class, 10)->create()->each(function ($p) {
            $p->save();
        });
    }
}
