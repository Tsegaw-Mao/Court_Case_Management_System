<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = [
            'alemu',
            'abreham',
            'ashenafi',
            'bereket',
            'beza',
            'brukti',
            'chernet',
            'degega',
            'dawit',
            'daniel',
            'elias',
            'efrem',
            'frew',
            'gizachew',
            'hiwot',
            'henok',
            'isayas',
            'jemal',
            'kefyalew',
            'lemlem',
            'meseret',
            'netsanet',
            'rediet',
            'sisay',
            'tesfaye',
            'omar',
            'mustefa',
            'wondosen',
            'yared',
            'yafet',
            'zelalem',
            'zerihun',
            'zewditu'
        ];
        for ($i = 0; $i < count($name); $i++) {
            $uid = $name[$i] . '001';
            $email = $name[$i] . '@gmail.com';
            User::create([
                'name' => $name[$i],
                'UserId' => $uid,
                'email' => $email,
                'password' => Hash::make($email)
            ]);
            
        }
    }
}
