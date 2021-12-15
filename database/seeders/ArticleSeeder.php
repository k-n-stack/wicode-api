<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        article::create(
            [ 'title'=>'Articlo Uno','description'=>'Articlo Uno Description','text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod sollicitudin arcu, a fringilla lectus. Vivamus eget lorem erat. Vestibulum congue congue risus, mollis auctor metus sagittis et. Ut scelerisque, lorem scelerisque maximus vulputate, arcu nulla aliquet tellus, ac tristique risus nunc at arcu.','image'=>'1']
        );
    }
}
