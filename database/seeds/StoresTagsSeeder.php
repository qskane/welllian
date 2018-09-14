<?php

use Illuminate\Database\Seeder;

class StoresTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Tag::class, 50)->create()->each(function ($p) {
            $p->save();
        });
    }
}
