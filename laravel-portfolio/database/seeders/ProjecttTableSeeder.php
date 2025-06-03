<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 
class ProjecttTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
     for( $i = 0; $i < 10; $i++ ){
        $newProject = new Project();
        $newProject->name = $faker-> name();
        $newProject->client = $faker->company();
        $newProject->period= $faker->dateTime();
        $newProject->summary = $faker->paragraph(5);

        $newProject->save();

     }
    }
}
