<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create(
            [ 'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet efficitur odio sed imperdiet. Nunc erat metus, blandit a ante ut, convallis dapibus velit. Nam turpis lacus, scelerisque eget interdum in, ultrices nec lectus. Duis eu eleifend arcu. Integer sed ex pellentesque, volutpat tortor nec, rutrum massa. Pellentesque maximus nec nisl nec mattis. Etiam ac lacus fringilla ipsum rutrum tristique. Integer volutpat venenatis massa, id convallis odio rutrum eu. Morbi at vestibulum lacus.']
        );
    }
}
