<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;

class ProjectTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 20; $i++){
            $project = Project::inRandomOrder()->first();

            $type_id = Type::inRandomOrder()->first();

            // $project->types()->attach($type_id);

            if ($project && $type_id) {
                $project->types()->attach($type_id->id);
            }
        }
    }
}
