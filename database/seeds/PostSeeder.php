<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<50; $i++){
            $p = new Post();
            $p->title = $faker->words( rand(4, 8), true );
            $p->content = $faker->text( rand(15, 50) );
            $p->slug = str_replace(' ', '-', $p->title);

            $p->save();
        }
    }
}
