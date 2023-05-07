<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $data = [];
                $data[] = [
                    'role_id' => 1,
                    'role_name' => 'Developer',
                    'role_detail' => 'Test',
                    'status' => 1,
                    'view_right' => 1,
                    'user_id' => 1
                ];

            $data[] = [
                'role_id' => 2,
                    'role_name' => 'Tester',
                    'role_detail' => 'Test 2',
                    'status' => 1,
                    'view_right' => 1,
                    'user_id' => 1
            ];
            DB::table('roles')->insert($data);
        }
    }
}
