<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        Classes::insert([
            [
                'name'              => 'Basic Acting for Beginners',
                'description'       => 'Pelatihan dasar seni peran untuk pemula.',
                'mentor'            => 'Renny Handayani Safitri',
                'day_of_week'       => 'Sabtu',
                'start_time'        => '10:00',
                'end_time'          => '12:00',
                'start_date'        => '2025-02-15',
                'duration_weeks'     => 12,
                'price'             => 3000000,
                'max_participant'   => 20,
                'status'            => 'upcoming',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Stage Management Fundamental',
                'description'       => 'Belajar dasar manajemen panggung dan produksi.',
                'mentor'            => 'Dewi Anggraini',
                'day_of_week'       => 'Selasa & Rabu',
                'start_time'        => '16:00',
                'end_time'          => '18:00',
                'start_date'        => '2025-01-10',
                'duration_weeks'     => 6,
                'price'             => 3500000,
                'max_participant'   => 15,
                'status'            => 'ongoing',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Creative Writing Theatre Script',
                'description'       => 'Menulis naskah kreatif untuk teater.',
                'mentor'            => 'Putri Amelia',
                'day_of_week'       => 'Minggu',
                'start_time'        => '13:00',
                'end_time'          => '15:00',
                'start_date'        => '2024-10-05',
                'duration_weeks'     => 8,
                'price'             => 2000000,
                'max_participant'   => 25,
                'status'            => 'finished',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
