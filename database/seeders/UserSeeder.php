<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $data = [];
            for ($i=1; $i<100; $i++){
                $data[] = [
                    'email' => 'test'. $i .'@gmail.com',
                    'password' => bcrypt('12345678'),
                    'fullname' => 'Admin'. $i . 'Green',
                    'entry_date' => '2023/05/03',
                    'department' => rand(1,2),
                    'role' => rand(1,2)
                ];
            }
    
            DB::table('employees')->insert($data);
        }
    }
}
