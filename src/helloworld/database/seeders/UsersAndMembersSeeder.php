<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;

class UsersAndMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 20 bản ghi cho bảng 'users' sử dụng Factory
        User::factory(20)->create();

        // Tạo 20 bản ghi cho bảng 'members' sử dụng Factory
        Member::factory(20)->create();
    }
}
