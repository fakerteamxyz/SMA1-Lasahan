<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetAdminPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset Super Admin password
        $updated = User::where('email', 'admin@sma-lareh.sch.id')
            ->update(['password' => Hash::make('admin123')]);

        if ($updated) {
            $this->command->info('Super Admin password telah berhasil diubah menjadi: admin123');
        } else {
            $this->command->error('Super Admin dengan email admin@sma-lareh.sch.id tidak ditemukan!');

            // Coba periksa user yang ada
            $users = User::all(['id', 'name', 'email'])->toArray();
            if (count($users) > 0) {
                $this->command->info('Daftar user yang tersedia:');
                foreach ($users as $user) {
                    $this->command->line("ID: {$user['id']}, Nama: {$user['name']}, Email: {$user['email']}");
                }
            } else {
                $this->command->info('Tidak ada user dalam database!');
            }
        }
    }
}
