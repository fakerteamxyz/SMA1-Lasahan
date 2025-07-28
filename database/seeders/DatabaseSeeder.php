<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Create or update super admin
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@sma-lareh.sch.id'],
            [
                'name' => 'Super Admin',
                'email' => 'admin@sma-lareh.sch.id',
                'password' => bcrypt('admin123'),
            ]
        );

        // Create or update regular admin
        \App\Models\User::updateOrCreate(
            ['email' => 'staff@sma-lareh.sch.id'],
            [
                'name' => 'Regular Admin',
                'email' => 'staff@sma-lareh.sch.id',
                'password' => bcrypt('admin123'),
            ]
        );

        // Run the School Profile seeder
        $this->call([
            SchoolProfileSeeder::class,
        ]);
    }
}
