<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $view1 = View::create([
            'user_id' => User::where('name',  'جامعة الجزيرة')->first()->id,
            'video_id' => Video::where('title', 'دورة علوم الحاسوب - جامعة الجزيرة')->first()->id,
            'views_number' => '70',
        ]);

        $view2 = View::create([
            'user_id' => User::where('name', 'الجامعة الماليزية')->first()->id,
            'video_id' => Video::where('title', 'دورة تطوير واجهات المستخدم - الجامعة الماليزية')->first()->id,
            'views_number' => '151',
        ]);

        $view3 = View::create([
            'user_id' => User::where('name', 'جامعة اب')->first()->id,
            'video_id' => Video::where('title', 'دورة تطوير الويب باستخدام لغة جافاسكريبت')->first()->id,
            'views_number' => '210',
        ]);

        $view4 = View::create([
            'user_id' => User::where('name', 'جامعة القلم')->first()->id,
            'video_id' => Video::where('title', 'دورة تطوير تطبيقات الهاتف باستخدام Cordova')->first()->id,
            'views_number' => '20',
        ]);

        $view5 = View::create([
            'user_id' => User::where('name', 'جامعة العلوم')->first()->id,
            'video_id' => Video::where('title', 'خمسة نصائح لاختيار أفضل المستقلين للعمل على مشروعك')->first()->id,
            'views_number' => '45',
        ]);

        $view6 = View::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'views_number' => '88',
        ]);

        $view7 = View::create([
            'user_id' => User::where('name', 'رشيد الخولاني')->first()->id,
            'video_id' => Video::where('title', 'وظف أفضل المستقلين الموجودين في الوطن العربي عن بعد')->first()->id,
            'views_number' => '69',
        ]);


    }
}
