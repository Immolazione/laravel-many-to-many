<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr; //HELPER PER ARRAY

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();  //RESTITUISCE ARRAY DI ARRAY [0 => 1, 1=> 2], CON toArray DARà [1, 2, 3, 4, 5]

        for($i = 0; $i < 10; $i++){
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(25);
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(250, 250);
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
