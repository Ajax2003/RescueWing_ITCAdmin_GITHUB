<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'BSIT_StudentUser',
                'usertype' => 'user',
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('secret'), // Hash the password before storing
            ],
            [
                'username' => 'ITCAdmin',
                'usertype' => 'admin',
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'password' => bcrypt('secret'), // Hash the password before storing
            ],
            [
                'username' => '662Barangay',
                'usertype' => 'barangay',
                'name' => 'Jay Dove',
                'email' => 'jay.dove@example.com',
                'password' => bcrypt('secret'), // Hash the password before storing
            ],
            [
                'username' => 'Clinic_ST',
                'usertype' => 'facillity',
                'name' => 'Logan Paul',
                'email' => 'logan.paul@example.com',
                'password' => bcrypt('secret'), // Hash the password before storing
            ],
            // Add more sample data as needed
        ];

        // Insert the sample data into the users table
        User::insert($users);
    }
}
