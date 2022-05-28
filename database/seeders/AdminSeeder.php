<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'bill.clinton2803@gmail.com',
                'hak_akses'=> '1',
                'password'=> bcrypt('bill2803'), 
        ],
        [
            'name' => 'siswa',
            'email' => 'bill.clinton2805@gmail.com',
            'hak_akses'=> '2',
            'password'=> bcrypt('bill2803'),
        ]
        ];

        foreach($user as $key => $value){
            User::create($value);
        }

    }
}
