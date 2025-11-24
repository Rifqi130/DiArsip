<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@diarsip.com',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'User Demo',
            'email' => 'user@diarsip.com',
            'username' => 'user',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        // Create Categories
        $umum = Category::create([
            'name' => 'Umum',
            'description' => 'Kategori dokumen umum',
        ]);

        Category::create([
            'name' => 'Kepegawaian',
            'description' => 'Dokumen kepegawaian',
            'parent_id' => $umum->id,
        ]);

        Category::create([
            'name' => 'Keuangan',
            'description' => 'Dokumen keuangan',
            'parent_id' => $umum->id,
        ]);

        $pelayanan = Category::create([
            'name' => 'Pelayanan',
            'description' => 'Kategori pelayanan',
        ]);

        Category::create([
            'name' => 'Pengaduan',
            'description' => 'Dokumen pengaduan',
            'parent_id' => $pelayanan->id,
        ]);

        $administrasi = Category::create([
            'name' => 'Administrasi',
            'description' => 'Kategori administrasi',
        ]);

        Category::create([
            'name' => 'Surat Masuk',
            'description' => 'Surat masuk',
            'parent_id' => $administrasi->id,
        ]);

        Category::create([
            'name' => 'Surat Keluar',
            'description' => 'Surat keluar',
            'parent_id' => $administrasi->id,
        ]);
    }
}
