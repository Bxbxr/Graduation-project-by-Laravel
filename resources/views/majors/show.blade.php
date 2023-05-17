@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-2xl py-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-2">{{ $major->name }}</h1>
            <hr class="border-b-2 border-gray-600 my-8 mx-auto w-1/2">
        </div>
        <div class="bg-white shadow-md rounded-lg px-8 py-6 mt-6">
            <p class="text-gray-700 text-lg leading-relaxed">{{ $major->description }}</p>
            <hr class="border-t-2 border-gray-600 my-8">
            <p class="text-gray-600 text-sm mb-2">Program Information:</p>
            <ul class="list-disc list-inside">
                <li class="text-gray-700 mb-2"><strong>البرنامج:</strong> {{ $major->name }}</li>
                <li class="text-gray-700 mb-2"><strong>التوجيه:</strong> {{ $major->duration }}</li>
                <li class="text-gray-700 mb-2"><strong>الدرجة:</strong>100</li>
                <li class="text-gray-700 mb-2"><strong>الساعات:</strong> نظام اترام</li>
            </ul>
        </div>
        <div class="py-4">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>الهدف</th>
                        <th>الوصف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>تطوير البرمجيات</td>
                        <td>يمكن لخريجي تخصص IT العمل في مجال تطوير البرمجيات، حيث يتم تصميم وتطوير البرامج والتطبيقات
                            لمختلف الأغراض. يمكن للخريجين العمل في شركات البرمجيات والتقنية أو كمستقلين.</td>
                    </tr>
                    <tr>
                        <td>تطوير مواقع الويب</td>
                        <td>يمكن لخريجي تخصص IT العمل في مجال تطوير مواقع الويب، حيث يتم تصميم وتطوير المواقع الإلكترونية
                            للشركات والأفراد.</td>
                    </tr>
                    <tr>
                        <td>تصميم الجرافيك</td>
                        <td>يمكن لخريجي تخصص IT العمل في مجال تصميم الجرافيك، حيث يتم تصميم الصور والرسومات والعلامات
                            التجارية للشركات والأفراد.</td>
                    </tr>
                    <tr>
                        <td>إدارة الشبكات</td>
                        <td>يمكن لخريجي تخصص IT العمل في مجال إدارة الشبكات، حيث يتم إدارة وصيانة الشبكات المعلوماتية
                            للشركات والمؤسسات.</td>
                    </tr>
                    <tr>
                        <td>الأمن السيبراني</td>
                        <td>يمكن لخريجي تخصص IT العمل في مجال الأمن السيبراني، حيث يتم تأمين الأنظمة المعلوماتية وحمايتها من
                            الهجمات الإلكترونية.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>الوظيفة</th>
            <th>البلدان</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>مطور برمجيات متخصص (Software Developer)</td>
            <td>الولايات المتحدة، المملكة العربيه السعوديه كندا، أستراليا</td>
        </tr>
        <tr>
            <td>مهندس شبكات (Network Engineer)</td>
            <td>الولايات المتحدة، المملكة المتحدة، ألمانيا، الإمارات العربية المتحدة</td>
        </tr>
        <tr>
            <td>محلل أمن المعلومات (Information Security Analyst)</td>
            <td>الولايات المتحدة، كندا، المملكة المتحدة، ألمانيا</td>
        </tr>
        <tr>
            <td>مهندس تطبيقات الجوال (Mobile Application Developer)</td>
            <td>الولايات المتحدة، كندا، أستراليا، الهند</td>
        </tr>
        <tr>
            <td>مهندس بيانات (Data Engineer)</td>
            <td>الولايات المتحدة، المملكة المتحدة، الهند، ألمانيا</td>
        </tr>
        <tr>
            <td>مهندس تجربة مستخدم (User Experience Engineer)</td>
            <td>الولايات المتحدة، المملكة المتحدة، أستراليا، كندا</td>
        </tr>
        <tr>
            <td>مدير مشروع تقنية المعلومات (IT Project Manager)</td>
            <td>الولايات المتحدة، المملكة المتحدة، كندا، ألمانيا</td>
        </tr>
    </tbody>
</table>

        </div>
    </div>


    </div>
@endsection
