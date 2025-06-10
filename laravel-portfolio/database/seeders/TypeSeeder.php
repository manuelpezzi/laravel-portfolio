<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['id' => 1, 'name' => 'Default','description' => 'Tipo predefinito'],
            ['name' => 'Web App',  'description' => 'Applicazioni web-based'],
            ['name' => 'Mobile App',  'description' => 'Applicazioni per dispositivi mobili'],
            ['name' => 'API',  'description' => 'Interfacce di programmazione'],
        ];

        foreach ($types as $type) {
            Type::firstOrCreate(['name' => $type['name']], $type);
        }
    }
}