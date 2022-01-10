<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Role;
use App\Models\ArticleCategory;
use App\Database\Factories\UserFactory;
use App\Database\Factories\ArticleCategoryFactory;
use App\Database\Factories\ArticleFactory;
use App\Database\Factories\CategoryFactory;
use App\Database\Factories\CommentFactory;
use App\Database\Factories\MessageFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 3 different roles
        error_log('Add role...');
        DB::table('roles')->insert([
            ['name' => 'super admin'],
            ['name' => 'admin'],
            ['name' => 'default'],
        ]);

        // create super admin user
        error_log('Create super admin users...');
        User::create([
            'firstname' => 'react',
            'lastname' => 'react',
            'email' => 'react@react.js',
            'password' => Hash::make('troplol'),
            'role_id' => 1,
        ]);

        // generate 199 more users for a total of 200
        error_log('Create default users...');
        User::factory()
            ->count(199)
            ->create();

        // generate 500 article from random user
        error_log('Create articles...');
        Article::factory()
            ->count(500)
            ->create();

        // generate 10 "main" category
        error_log('Create categories...');
        Category::factory()
            ->count(10)
            ->create();

        // generate 2000 comment
        error_log('Create comments...');
        Comment::factory()
            ->count(2000)
            ->create();

        // generate 100 messsages
        error_log('Create messages...');
        Message::factory()
            ->count(100)
            ->create();

        // put 100 article in categories
        error_log('Add tuples in pivot table...');
        for($i = 0; $i < 100; ++$i) {
            DB::table('article_category')->insert([
                'article_id' => random_int(1, 250), 
                'category_id' => random_int(1, 10),
            ]);
        };
    }
}
