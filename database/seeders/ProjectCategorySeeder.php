<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $data = [];
                $data[] = [
                    'category_id' => 1,
                    'category_name' => 'Test',
                    'category_detail' => 'Test process related project',
                    'status' => 1,
                    'user_id' => 1
                ];
                    
            $data[] = [
                'category_id' => 2,
                    'category_name' => 'Development',
                    'category_detail' => 'Dev project',
                    'status' => 1,
                    'user_id' => 1
            ];

            $data[] = [
                'category_id' => 3,
                    'category_name' => 'Planning',
                    'category_detail' => 'Get requirement, create plan according to customer request',
                    'status' => 1,
                    'user_id' => 1
            ];
            DB::table('project_categories')->insert($data);
        }
    }
}
