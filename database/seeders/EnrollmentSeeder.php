<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        Enrollment::insert([
            [
                'id_user'     => 1,
                'id_class'    => 1,
                'status'      => 'approved',
                'progress'    => 20,
                'enrolled_at' => now(),
            ],
            [
                'id_user'     => 2,
                'id_class'    => 1,
                'status'      => 'approved',
                'progress'    => 0,
                'enrolled_at' => now(),
            ],
            [
                'id_user'     => 3,
                'id_class'    => 2,
                'status'      => 'approved',
                'progress'    => 40,
                'enrolled_at' => now(),
            ]
        ]);
    }
}
