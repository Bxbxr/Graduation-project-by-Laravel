<?php

namespace Database\Seeders;

use App\Models\Alert;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alert1 = Alert::create([
            'user_id' => User::where('name', 'جامعة الجزيرة')->first()->id,
            'alert' => '0',
        ]);

        $alert2 = Alert::create([
            'user_id' => User::where('name', 'الجامعة الماليزية')->first()->id,
            'alert' => '0',
        ]);

        $alert3 = Alert::create([
            'user_id' => User::where('name', 'جامعة اب')->first()->id,
            'alert' => '0',
        ]);

        $alert4 = Alert::create([
            'user_id' => User::where('name', 'جامعة القلم')->first()->id,
            'alert' => '0',
        ]);

        $alert5 = Alert::create([
            'user_id' => User::where('name', 'جامعة العلوم')->first()->id,
            'alert' => '0',
        ]);

        $alert6 = Alert::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'alert' => '0',
        ]);

         $alert7 = Alert::create([
            'user_id' => User::where('name', 'رشيد الخولاني')->first()->id,
            'alert' => '0',
        ]);
    }
}
