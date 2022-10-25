<?php

use App\Category;
use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categoryIds = Category::all()->pluck('id');
        // print_r($categoryIds);
        // exit;
        $tags = Tag::all()->pluck('id');
        // print_r($tags);
        // exit;

        for($i=0; $i<50; $i++){
            $p = new Post();
            $p->title = $faker->words( rand(4, 8), true );
            $p->content = $faker->text( rand(15, 50), true );
            $p->slug = Str::slug($p->title);
            $p->category_id = $faker->optional()->randomElement($categoryIds);

            $p->save();

            $tagIds = $tags->shuffle()->take(2)->all();
            $p->tags()->sync($tagIds);
        }
    }
}
