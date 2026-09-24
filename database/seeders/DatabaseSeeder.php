<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $accounts = [
            ['nama' => 'Admin EVChargeHub', 'email' => 'admin@evchargehub.test', 'peran' => 'admin'],
            ['nama' => 'Operator EVChargeHub', 'email' => 'operator@evchargehub.test', 'peran' => 'operator'],
            ['nama' => 'Pengemudi Demo', 'email' => 'pengemudi@evchargehub.test', 'peran' => 'pengemudi'],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                [
                    'nama' => $account['nama'],
                    'kata_sandi' => Hash::make('password'),
                    'nomor_telepon' => '081234567890',
                    'peran' => $account['peran'],
                    'status_akun' => 'aktif',
                ],
            );
        }
    }
}
