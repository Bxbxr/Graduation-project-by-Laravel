<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment1 = Comment::create([
            'user_id' => User::where('name',  'جامعة الجزيرة')->first()->id,
            'video_id' => Video::where('title', 'دورة علوم الحاسوب - جامعة الجزيرة')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment2 = Comment::create([
            'user_id' => User::where('name', 'الجامعة الماليزية')->first()->id,
            'video_id' => Video::where('title', 'دورة تطوير واجهات المستخدم - الجامعة الماليزية')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        $comment3 = Comment::create([
            'user_id' => User::where('name', 'جامعة اب')->first()->id,
            'video_id' => Video::where('title', 'دورة تطوير الويب باستخدام لغة جافاسكريبت')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment4 = Comment::create([
            'user_id' => User::where('name', 'جامعة القلم')->first()->id,
            'video_id' => Video::where('title', 'دورة تطوير تطبيقات الهاتف باستخدام Cordova')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        $comment5 = Comment::create([
            'user_id' => User::where('name', 'جامعة العلوم')->first()->id,
            'video_id' => Video::where('title', 'خمسة نصائح لاختيار أفضل المستقلين للعمل على مشروعك')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment6 = Comment::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        $comment7 = Comment::create([
            'user_id' => User::where('name', 'رشيد الخولاني')->first()->id,
            'video_id' => Video::where('title', 'وظف أفضل المستقلين الموجودين في الوطن العربي عن بعد')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment8 = Comment::create([
            'user_id' => User::where('name','ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        $comment9 = Comment::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment10 = Comment::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        
        $comment11 = Comment::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment12 = Comment::create([
            'user_id' => User::where('name', 'ابراهيم الورافي')->first()->id,
            'video_id' => Video::where('title', 'اعرض خدماتك في أكبر سوق عربي لعرض وشراء الخدمات المصغرة')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        $comment13 = Comment::create([
            'user_id' => User::where('name', 'جامعة الجزيرة')->first()->id,
            'video_id' => Video::where('title', 'دورة علوم الحاسوب - جامعة الجزيرة')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);

        $comment14 = Comment::create([
            'user_id' => User::where('name', 'جامعة الجزيرة')->first()->id,
            'video_id' => Video::where('title', 'دورة علوم الحاسوب - جامعة الجزيرة')->first()->id,
            'body' => 'أرجو لكم المزيد من النجاح، دورة رائعة واستفدت منها كثيرًا',
        ]);

        $comment15 = Comment::create([
            'user_id' => User::where('name', 'جامعة الجزيرة')->first()->id,
            'video_id' => Video::where('title', 'دورة علوم الحاسوب - جامعة الجزيرة')->first()->id,
            'body' => 'شكرًا لكم عل هذه الدورة الرائعة',
        ]);
    }
}
