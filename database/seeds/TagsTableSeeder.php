<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = Tag::create([
            'name' => 'tag1',
        ]);

        $tag2 = Tag::create([
            'name' => 'tag2',
        ]);

        $tag3 = Tag::create([
            'name' => 'tag3',
        ]);

        $tag4 = Tag::create([
            'name' => 'tag4',
        ]);

        $tag5 = Tag::create([
            'name' => 'tag5',
        ]);
    }
}
