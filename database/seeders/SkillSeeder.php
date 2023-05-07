<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $data = [];
                $data[] = [
                    'skill_id' => 1,
                    'skill_name' => 'Java',
                    'skill_detail' => 'Have required knowledge relating to Java',
                    'status' => 1,
                    'user_id' => 1
                ];
                    
            $data[] = [
                'skill_id' => 2,
                    'skill_name' => 'Python',
                    'skill_detail' => 'Have required knowledge relating to Java',
                    'status' => 1,
                    'user_id' => 1
            ];
            DB::table('skills')->insert($data);
        }
    }
}
