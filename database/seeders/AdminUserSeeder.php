<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user dengan email admin@sma-lareh.sch.id jika ada
        DB::table('users')->where('email', 'admin@sma-lareh.sch.id')->delete();

        // Buat user admin baru
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@sma-lareh.sch.id',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Hapus user dengan email staff@sma-lareh.sch.id jika ada
        DB::table('users')->where('email', 'staff@sma-lareh.sch.id')->delete();

        // Buat user staff baru
        DB::table('users')->insert([
            'name' => 'Staff Admin',
            'email' => 'staff@sma-lareh.sch.id',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info('User admin berhasil dibuat dengan email admin@sma-lareh.sch.id dan password admin123');
        $this->command->info('User staff berhasil dibuat dengan email staff@sma-lareh.sch.id dan password admin123');
    }
}
