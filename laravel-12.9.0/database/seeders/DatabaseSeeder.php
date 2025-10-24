<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\Teach;
use App\Models\Study;
use App\Models\Term;
use App\Models\Registration;
use App\Models\Room;
use App\Models\Takes_place;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // INFO: fill static data -> user

        $names = ['admin',
                  'Theodoor Mullins',
                  'Gun-woo Gomułka',
                  'Magali Isayeva',
                  'Hadizatu Boveri',
                  'Kléber Armistead',
                  'Rudīte Tadić',
                  'Hasan Fèvre',
                  'Maria Griffiths',
                  'Cecilia Neumann',
                  'Lumusi Staněk'];

        $mails = ['admin@wis',
                  'TheodoorMullins@gmail.com',
                  'GunwooGomulka@yahoo.com',
                  'MagaliIsayeva@gmail.com',
                  'HadizatuBoveri@gmail.com',
                  'KleberArmistead@outlook.com',
                  'RuditeTadic@yahoo.com',
                  'HasanFevre@protonmail.com',
                  'MariaGriffiths@outlook.com',
                  'CeciliaNeumann@gmail.com',
                  'LumusiStanek@gmail.com'];

        for ($i = 0; $i < 11; $i++) {
            User::query()->insert([
                'name' => $names[$i],
                'email' => $mails[$i],
                'password' => Hash::make('password')
            ]);
        }

        // INFO: fill static data -> courses

        Course::query()->insert([
            'shortcut' => 'xmat',
            'type' => 'Z',
            'price' => '10',
            'description' => 'Course about calculus',
            'user_id' => 2,
        ]);

        Course::query()->insert([
            'shortcut' => 'xpro',
            'type' => 'Z',
            'price' => '90',
            'description' => 'Course about programming in C',
            'user_id' => 3,
        ]);

        // INFO: fill static data -> teach

        Teach::query()->insert([
            'user_id' => 2,
            'shortcut' => 'xmat'
        ]);

        Teach::query()->insert([
            'user_id' => 4,
            'shortcut' => 'xmat'
        ]);

        Teach::query()->insert([
            'user_id' => 3,
            'shortcut' => 'xpro'
        ]);

        Teach::query()->insert([
            'user_id' => 5,
            'shortcut' => 'xpro'
        ]);

        // INFO: fill static data -> study
        Study::query()->insert([
            'user_id' => 6,
            'shortcut' => 'xmat'
        ]);
        Study::query()->insert([
            'user_id' => 7,
            'shortcut' => 'xmat'
        ]);
        Study::query()->insert([
            'user_id' => 8,
            'shortcut' => 'xmat'
        ]);
        Study::query()->insert([
            'user_id' => 9,
            'shortcut' => 'xpro'
        ]);
        Study::query()->insert([
            'user_id' => 11,
            'shortcut' => 'xpro'
        ]);

        // INFO: fill static data -> term

        $names_term = ['programovanie skúška',
                   'programovanie zápočet',
                   'matematika skúška',
                   'matematika zápočet',
            'matematika test'];

        $type_term = ['S','Z','S','Z','T'];
        $max_points = [51, 30, 80, 10, 5];
        $date_term = ['2025-12-25','2025-12-01','2025-12-28','2025-12-05','2025-10-20',];
        $shortcut_term = ['xpro','xpro','xmat','xmat','xmat'];

        for ($i = 0; $i < 5; $i++) {
            Term::query()->insert([
                'name' => $names_term[$i],
                'type' => $type_term[$i],
                'max_points' => $max_points[$i],
                'date' => $date_term[$i],
                'shortcut' => $shortcut_term[$i]
            ]);
        }

        // INFO: fill static data -> registration

        Registration::query()->insert([
            'user_id' => 6,
            'id_term' => 4
        ]);
        Registration::query()->insert([
            'user_id' => 7,
            'id_term' => 4
        ]);
        Registration::query()->insert([
            'user_id' => 8,
            'id_term' => 4
        ]);
        Registration::query()->insert([
            'user_id' => 8,
            'id_term' => 5
        ]);
        Registration::query()->insert([
            'user_id' => 9,
            'id_term' => 2
        ]);
        Registration::query()->insert([
            'user_id' => 11,
            'id_term' => 2
        ]);

        // INFO: fill static data -> room
        Room::query()->insert([
            'code' => 'C203',
            'capacity' => 10,
        ]);
        Room::query()->insert([
            'code' => 'G303',
            'capacity' => 20
        ]);
        Room::query()->insert([
            'code' => 'A201',
            'capacity' => 30
        ]);

        // INFO: fill static data -> takes_place
        Takes_place::query()->insert([
            'id_room' => 1,
            'id_term' => 1
        ]);

        Takes_place::query()->insert([
            'id_room' => 2,
            'id_term' => 2
        ]);

        Takes_place::query()->insert([
            'id_room' => 1,
            'id_term' => 3
        ]);

        Takes_place::query()->insert([
            'id_room' => 2,
            'id_term' => 4
        ]);

        Takes_place::query()->insert([
            'id_room' => 1,
            'id_term' => 5
        ]);
    }
}
