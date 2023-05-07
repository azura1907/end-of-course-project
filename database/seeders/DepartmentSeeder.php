<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $data = [];
                $data[] = [
                    'department_id' => 1,
                    'department_name' => 'Development',
                    'department_detail' => 'Test',
                    'status' => 1,
                    'user_id' => 1
                ];
                    
            $data[] = [
                'department_id' => 2,
                'department_name' => 'Test Department',
                'department_detail' => 'Test 2',
                'status' => 1,
                'user_id' => 1
            ];
            DB::table('departments')->insert($data);
        }
    }
}
