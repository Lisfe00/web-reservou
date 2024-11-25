<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(
            [
                'name' => RolesEnum::COURT_OWNER,
                'guard_name' => 'web'
            ],
        );

        Role::create(
            [
                'name' => RolesEnum::CLIENT,
                'guard_name' => 'web'
            ],
        );
    }
}
