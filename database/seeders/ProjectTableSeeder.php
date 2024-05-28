<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use App\Functions\Helper as Help;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Project 1',
                'description' => 'Description of Project 1',
                'project_url' => 'https://github.com/Jomar-Navarro/vue-boolzapp',
                'image' => 'img/public/img/imagenotfound.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project 2',
                'description' => 'Description of Project 2',
                'project_url' => 'https://github.com/Jomar-Navarro/laravel-auth',
                'image' => 'img/public/img/imagenotfound.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ];

        foreach($projects as $item){
            $new_item = new Project();
            $new_item->technology_id = Technology::inRandomOrder()->first()->id;
            $new_item->title = $item['title'];
            $new_item->slug = Help::generateSlug($item['title'], Project::class);
            $new_item->description = $item['description'];
            $new_item->project_url = $item['project_url'];
            $new_item->image = $item['image'] ?: 'img/public/img/imagenotfound.jpg';
            $new_item->created_at = $item['created_at'];
            $new_item->updated_at = $item['updated_at'];

            $new_item->save();
        }
    }
}
