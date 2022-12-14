<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 8; $i++) {
            $new_post = new Post();
            $new_post->title = ucfirst($faker->words(rand(3, 7), true));
            $new_post->content = $faker->paragraphs(rand(5, 10), true);
            $new_post->slug = Str::of($new_post->title)->slug('-');
            $new_post->save();
        }
    }
}
