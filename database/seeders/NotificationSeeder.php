<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notification1 = Notification::create([
            'user_id' => User::where('name', 'جامعة الجزيرة')->first()->id,
            'notification' => Video::where('title', 'دورة علوم الحاسوب - جامعة الجزيرة')->first()->title,
            'success' => '1',
        ]);

        $notification2 = Notification::create([
            'user_id' => User::where('name', 'الجامعة الماليزية')->first()->id,
            'notification' => Video::where('title', 'دورة تطوير واجهات المستخدم - الجامعة الماليزية')->first()->title,
            'success' => '0',
        ]);

        $notification3 = Notification::create([
            'user_id' => User::where('name', 'جامعة اب')->first()->id,
            'notification' => Video::where('title', 'دورة تطوير الويب باستخدام لغة جافاسكريبت')->first()->title,
            'success' => '1',
        ]);

        $notification4 = Notification::create([
            'user_id' => User::where('name', 'جامعة القلم')->first()->id,
            'notification' => Video::where('title', 'دورة تطوير تطبيقات الهاتف باستخدام Cordova')->first()->title,
            'success' => '1',
        ]);

        $notification5 = Notification::create([
            'user_id' => User::where('name', 'جامعة العلوم')->first()->id,
            'notification' => Video::where('title', 'خمسة نصائح لاختيار أفضل المستقلين للعمل على مشروعك')->first()->title,
            'success' => '1',
        ]);

        $notification6 = Notification::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'notification' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->title,
            'success' => '1',
        ]);

        $notification7 = Notification::create([
            'user_id' => User::where('name', 'رشيد الخولاني')->first()->id,
            'notification' => Video::where('title', 'وظف أفضل المستقلين الموجودين في الوطن العربي عن بعد')->first()->title,
            'success' => '1',
        ]);

        $notification8 = Notification::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'notification' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->title,
            'success' => '1',
        ]);
    }
}
