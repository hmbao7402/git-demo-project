<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'type' => 'super_admin',
                'vendor_id' => 0,
                'mobile' => '0979011774',
                'email' => 'admin@admin.com',
                'password' => '$2a$12$LlLZ1g5TgAAzQzYZE7ffXuOE7lvCWCpgrULgMrEeYa88d4T4gQAc2',
                'image' => '',
                'status' => 1,
            ],
        ];
        Admin::insert($adminRecords);
    }
}
