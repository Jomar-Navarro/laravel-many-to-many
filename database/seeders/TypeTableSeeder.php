<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper as Help;
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Front End', 'Back End', 'Design'];
        foreach($data as $item){
            $new_item = new Type();
            $new_item->title = $item;
            $new_item->slug = Help::generateSlug($item, Type::class);

            $new_item->save();
        }
    }
}
