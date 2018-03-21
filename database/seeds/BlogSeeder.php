<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //utenti
        User::create([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('sapiens')
        ]);

        $users = factory(User::class, 10)->create();
        $categories = factory(Category::class, 5)->create();
        $tags = factory(Tag::class, 15)->create();
        foreach ($users as $user) {
            $posts = factory(Post::class, 10)->create(
                [
                    'user_id' => $user->id,
                    'category_id' => $categories->random(),
                ]
            );

            foreach ($posts as $post) {
                $post->tags()->sync($tags->random(3));
            }
        }
    }
}
