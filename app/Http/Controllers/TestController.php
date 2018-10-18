<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;

class TestController extends Controller
{

    public function index()
    {
        //        $faker = Generator\Factory::create();

        $fake = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            echo "<h3 style='background-color:$fake->rgbCssColor '>1</h3>";
//            dump($fake->rgbCssColor, $fake->colorName, $fake->rgbColor);
        }

        exit();

        return view('test.index');
    }

    public function view()
    {
        return view('test.view');
    }

    public function league()
    {
        return view('test.league');
    }

}
