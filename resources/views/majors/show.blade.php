@extends('layouts.main')

@section('content')
    <div class="container mx-auto max-w-2xl py-8 pl-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-2 text-danger">{{ $major->name }}</h1>
            <hr class="border-b-2 border-gray-600 my-8 mx-auto w-1/2">
        </div>
        <div class="bg-white shadow-md rounded-lg px-8 py-6 mt-6">
            <div class="py-4 text-dark" style="font-size: 20px">
                {!! $major->description !!}

            </div>

            <hr class="border-t-2 border-gray-600 my-8">
            <p class="text-danger text-sm mb-2 text-2xl">معلومات البرنامج:</p>
            <ul class="list-disc list-inside " style="font-size: 17px">
                <li class="text-gray-700 mb-2"><strong>البرنامج:</strong> {{ $major->name }}</li>
                <li class="text-gray-700 mb-2"><strong>التوجيه:</strong> {{ $major->duration }}</li>
                <li class="text-gray-700 mb-2"><strong>الدرجة:</strong>100</li>
                <li class="text-gray-700 mb-2"><strong>الساعات:</strong> نظام اترام</li>
            </ul>
        </div>

    </div>
    <div class="container">
        <p class="text-danger text-xl">
            اهداف هذا التخصص 
        </p>
        {!! $major->goals !!}
        <hr class="border-t-2 border-gray-600 my-8">
         <p class="text-danger text-xl">
            الوضائف المستقبلية لهذا التخصص 
        </p>
        {!! $major->jobs_in_future !!}
    </div>
@endsection
