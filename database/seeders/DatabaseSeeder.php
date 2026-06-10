<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'admin@softurasolutions.com'],
            [
                'name'     => 'Admin Softura',
                'password' => bcrypt('Softura@Admin2024!'),
                'is_admin' => true,
            ]
        );

        $this->call([
            ConocenosHeroSeeder::class,
            ConocenosDifferentiatorsSeeder::class,
            ConocenosPillarsSeeder::class,
            ConocenosSupportSeeder::class,
            ConocenosClientsSeeder::class,
            ConocenosTestimonialsSeeder::class,
            ConocenosCareersSeeder::class,
            InicioSeeder::class,
            InicioExtendedSeeder::class,
            FabricaSeeder::class,
            NearshoringSeeder::class,
            ProductosSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
