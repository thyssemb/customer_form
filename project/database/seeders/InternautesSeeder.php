<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InternautesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('internautes')->insert([
            [
                'name' => 'Doe',
                'firstname' => 'John',
                'birthday' => '1990-05-15',
                'picture' => 'profile_pictures/john.doe.jpg',
                'number' => '0601020304',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'mailing_address' => '123 rue de Paris, 75000 Paris',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smith',
                'firstname' => 'Jane',
                'birthday' => '1985-07-22',
                'picture' => 'profile_pictures/jane.smith.jpg',
                'number' => '0611121314',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password456'),
                'mailing_address' => '456 avenue de Lyon, 69000 Lyon',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dupont',
                'firstname' => 'Paul',
                'birthday' => '1995-09-10',
                'picture' => 'profile_pictures/paul.dupont.jpg',
                'number' => '0622334455',
                'email' => 'paul.dupont@example.com',
                'password' => Hash::make('password789'),
                'mailing_address' => '789 boulevard Saint-Michel, 75005 Paris',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Martin',
                'firstname' => 'Sophie',
                'birthday' => '1992-03-30',
                'picture' => 'profile_pictures/sophie.martin.jpg',
                'number' => '0633445566',
                'email' => 'sophie.martin@example.com',
                'password' => Hash::make('password321'),
                'mailing_address' => '321 rue de Bordeaux, 33000 Bordeaux',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leclerc',
                'firstname' => 'Pierre',
                'birthday' => '1988-11-05',
                'picture' => 'profile_pictures/pierre.leclerc.jpg',
                'number' => '0644556677',
                'email' => 'pierre.leclerc@example.com',
                'password' => Hash::make('password654'),
                'mailing_address' => '654 rue de Lille, 59000 Lille',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bertrand',
                'firstname' => 'Camille',
                'birthday' => '1997-06-20',
                'picture' => 'profile_pictures/camille.bertrand.jpg',
                'number' => '0655667788',
                'email' => 'camille.bertrand@example.com',
                'password' => Hash::make('password987'),
                'mailing_address' => '987 avenue des Champs, 75008 Paris',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Morel',
                'firstname' => 'Luc',
                'birthday' => '1991-02-14',
                'picture' => 'profile_pictures/luc.morel.jpg',
                'number' => '0677889900',
                'email' => 'luc.morel@example.com',
                'password' => Hash::make('password159'),
                'mailing_address' => '159 rue de la Liberté, 69003 Lyon',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Girard',
                'firstname' => 'Elodie',
                'birthday' => '1994-12-01',
                'picture' => 'profile_pictures/elodie.girard.jpg',
                'number' => '0688990011',
                'email' => 'elodie.girard@example.com',
                'password' => Hash::make('password753'),
                'mailing_address' => '753 boulevard des Anglais, 06000 Nice',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lemoine',
                'firstname' => 'Antoine',
                'birthday' => '1993-08-27',
                'picture' => 'profile_pictures/antoine.lemoine.jpg',
                'number' => '0699001122',
                'email' => 'antoine.lemoine@example.com',
                'password' => Hash::make('password852'),
                'mailing_address' => '852 rue de Bretagne, 35000 Rennes',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chauvet',
                'firstname' => 'Nathalie',
                'birthday' => '1996-05-10',
                'picture' => 'profile_pictures/nathalie.chauvet.jpg',
                'number' => '0611223344',
                'email' => 'nathalie.chauvet@example.com',
                'password' => Hash::make('password369'),
                'mailing_address' => '369 avenue du Soleil, 13000 Marseille',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
