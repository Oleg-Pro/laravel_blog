<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $softwareCategoryId = DB::table('categories')->insertGetId(
            ['name' => 'software development']
        );

//        DB::table('categories')->insert([
//            ['name' => 'software development'],
//            ['name' => 'system administration'],
//            ['name' => 'business'],
//        ]);


        $phpTagId = DB::table('tags')->insertGetId(
            ['name' => 'php']
        );
        $laravelTagId = DB::table('tags')->insertGetId(
            ['name' => 'laravel']
        );

        $databasesTagId = DB::table('tags')->insertGetId(
            ['name' => 'databases']
        );

        $eloquentTagId = DB::table('tags')->insertGetId(
            ['name' => 'eloquent']
        );

        $migrationsTagId = DB::table('tags')->insertGetId(
            ['name' => 'migrations']
        );


        //insert migration laravel and related data
        $laravelMigrationPostId = DB::table('posts')->insertGetId([
            'name' => 'laravel-migrations',
            'title' => 'Migrations in Laravel',
            'content' => 'We\'ll try to describe everything about migrations in laravel.',
            'category_id' => $softwareCategoryId,
            'status' => \App\Post::PUBLISH_STATUS,
            'posted_at' => date('Y-m-d H:i:s'),
        ]);


        DB::table('post_tag')->insert([
            ['post_id' => $laravelMigrationPostId, 'tag_id' => $phpTagId],
            ['post_id' => $laravelMigrationPostId, 'tag_id' => $laravelTagId],
            ['post_id' => $laravelMigrationPostId, 'tag_id' => $databasesTagId],
        ]);

        DB::table('revisions')->insert([
            [
                'title' => 'Migrations in Laravel',
                'content' => 'Our first version of migration laravel article.',
                'is_current' => false,
                'post_id' => $laravelMigrationPostId
            ],
            [
                'title' => 'Migrations in Laravel',
                'content' => 'Our second version of migration laravel article.',
                'is_current' => false,
                'post_id' => $laravelMigrationPostId
            ],
            [
                'title' => 'Migrations in Laravel',
                'content' => 'We\'ll try to describe everything about migrations in laravel.',
                'is_current' => true,
                'post_id' => $laravelMigrationPostId
            ]
        ]);

        DB::table('comments')->insert([
            [
                'author' => 'John',
                'body' => 'This is great.',
                'post_id' => $laravelMigrationPostId
            ],
            [
                'author' => 'Vasya',
                'body' => 'This is bullshit.',
                'post_id' => $laravelMigrationPostId
            ],
            [
                'author' => 'Helen',
                'body' => 'Excellent. Thank you.',
                'post_id' => $laravelMigrationPostId
            ],
        ]);


        //insert post about Eloquent and related data
        $eloquentPostId = DB::table('posts')->insertGetId([
            'name' => 'eloquent',
            'title' => 'All you need to know about Eloquent',
            'content' => 'We\'ll try to describe how to use Eloquent correct.',
            'category_id' => $softwareCategoryId,
        ]);

        DB::table('post_tag')->insert([
            ['post_id' => $eloquentPostId, 'tag_id' => $phpTagId],
            ['post_id' => $eloquentPostId, 'tag_id' => $laravelTagId],
            ['post_id' => $eloquentPostId, 'tag_id' => $databasesTagId],
            ['post_id' => $eloquentPostId, 'tag_id' => $eloquentTagId],
            ['post_id' => $eloquentPostId, 'tag_id' => $migrationsTagId],

        ]);

        DB::table('revisions')->insert([
            [
                'title' => 'All you need to know about Eloquent',
                'content' => 'Our first version of eloquent article.',
                'is_current' => false,
                'post_id' => $eloquentPostId
            ],
            [
                'title' => 'All you need to know about Eloquent',
                'content' => 'Our second version of eloquent laravel article.',
                'is_current' => false,
                'post_id' => $eloquentPostId
            ],
            [
                'title' => 'All you need to know about Eloquent',
                'content' => 'We\'ll try to describe how to use Eloquent correct.',
                'is_current' => true,
                'post_id' => $eloquentPostId
            ]
        ]);

        DB::table('comments')->insert([
            [
                'author' => 'John',
                'body' => 'Eloquent is fantastic.',
                'post_id' => $eloquentPostId
            ],
            [
                'author' => 'Vasya',
                'body' => 'Active Record is evil',
                'post_id' => $eloquentPostId
            ],
            [
                'author' => 'Helen',
                'body' => 'Excellent. Thank you.',
                'post_id' => $eloquentPostId
            ],
        ]);
    }
}
