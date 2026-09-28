<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Project::create([
            'title' => 'Bracelet of Words',
            'engine' => 'Unreal Engine 5',
            'description' => 'Third-person action-adventure single-player. Pemain mengetik kata secara real-time saat combat untuk mengubahnya jadi kekuatan elemental lewat Bracelet of Elements. Target presentasi: semi-AAA vertical slice.',
            'status' => 'In Development',
        ]);

        Project::create([
            'title' => 'Portofolio Website',
            'engine' => 'Laravel & Vue',
            'description' => 'Website portofolio ini sendiri — dibangun dengan Laravel sebagai backend dan Vue via Inertia.js sebagai frontend, lengkap dengan CI/CD pipeline di GitHub Actions.',
            'status' => 'Live',
        ]);
    }
}
