<?php

namespace Database\Seeders;

use App\Models\Depertment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WebsiteSettingSeeder::class);

        Depertment::factory(10)->create();
    }
}
