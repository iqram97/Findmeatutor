<?php

use App\User;
use App\Student;
use App\Tutor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'first_name'        => 'Super',
            'last_name'         => 'Admin',
            'phone'             => '0123456789',
            'avatar'            => 'backEnd/images/avatar.jpg',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('admin12345'), /*admin12345*/
            'role'              => 1,
            'is_active'         => 1,
            ]
        );

        Student::create(
            [
            'first_name'        => 'Mr. Student',
            'last_name'         => null,
            'phone'             => '0123456789',
            'avatar'            => 'backEnd/images/avatar.jpg',
            'email'             => 'student@gmail.com',
            'password'          => Hash::make('student12345'), /*student12345*/
            'role'              => 3,
            'is_active'         => 1,
            ]
        );

        Tutor::create(
            [
            'first_name'        => 'Mr. Tutor',
            'last_name'         => null,
            'phone'             => '0123456789',
            'avatar'            => 'backEnd/images/avatar.jpg',
            'email'             => 'tutor@gmail.com',
            'password'          => Hash::make('tutor12345'), /*tutor12345*/
            'role'              => 4,
            'is_active'         => 1,
            ]
        );
    }
}
