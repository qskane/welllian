<?php

use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{

    public function run()
    {

        \App\Models\Template::insert([
            [
                'name' => 'fake',
                'style' => '<style>#{{$container}}-container{
color:red;
}</style>',
                'html'=>'@for($i=0;$i<5;$i++)
    <p id=\'{{$container}}-container\'>example {{$i}}</p>
@endfor',
                'script'=>'<script>
  (function(){
    var container = document.getElementById(\'{{$container}}-container\');
    console.log(container)
  })();
</script>'
            ],

        ]);

    }
}
