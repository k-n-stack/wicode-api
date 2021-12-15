<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cat = array(
            [ 'name'=>'Javascript','description'=>'Langage javascript'],
            [ 'name'=>'PHP','description'=>'Langage PHP'],
            [ 'name'=>'Python','description'=>'Langage Python'],
        );

        foreach($cat as $elem) {
            Category::create($elem);
        }
    }
}
