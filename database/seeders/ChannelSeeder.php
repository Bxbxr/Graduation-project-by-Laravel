<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $university = User::create([
            'name'=>"جامعة الجزيرة",
            'email'=>'jazeera@gmail.com',
            'password'=>bcrypt('11111111'),
            'administration_level'=>'1',
            'current_team_id'=>"1",
        ]);

        $university2 = User::create([
            'name'=>"الجامعة الماليزية",
            'email'=>'malez@gmail.com',
            'password'=>bcrypt('11111111'),
            'administration_level'=>'0',
            'current_team_id'=>"2",
        ]);

        $university3 = User::create([
            'name'=>"جامعة اب",
            'email'=>'ibb@gmail.com',
            'password'=>bcrypt('11111111'),
            'administration_level'=>'1',
            'current_team_id'=>'3',
        ]);

        $university4 = User::create([
            'name'=>"جامعة القلم",
            'email'=>'kalam@gmail.com',
            'password'=>bcrypt('11111111'),
            'administration_level'=>'0',
            'current_team_id'=>"4",
        ]);

        $university5 = User::create([
            'name'=>"جامعة العلوم",
            'email'=>'aloom@gmail.com',
            'password'=>bcrypt('11111111'),
            'administration_level'=>'1',
            'current_team_id'=>"5",
        ]);

        $university6 = User::create([
            'name'=>"ابراهيم الورافي",
            'email'=>'ibrahimahaj736@gmail.com',
            'password'=>bcrypt('12345678'),
            'administration_level'=>'2',
            'current_team_id'=>"6",
        ]);

        $university7 = User::create([
            'name'=>"رشيد الخولاني",
            'email'=>'rashid@gmail.com',
            'password'=>bcrypt('11111111'),
            'administration_level'=>'2',
            'current_team_id'=>"1",
        ]);
    }
}
