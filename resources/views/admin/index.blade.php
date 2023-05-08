@extends('theme.default')

@section('heading')
    لوحة التحكم
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                عدد مقاطع الفيديو</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numberOfVideos }}</div>
                        </div>
                        <div class="col-auto">
                            <i class=" fa fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                عدد الجامعات</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numberOfUniversities }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                عدد الطلاب</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numberOfStudents }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                عدد المنشورات</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numberOfPosts }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <canvas id="myChart" class="mt-4"></canvas>
    </div>
@endsection

@section('script')
    <script>
        var names = <?php echo $names; ?>;
        var totalViews = <?php echo $totalViews; ?>;

        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'الجامعات ذات المحتوى الاكثر مشاهدة',
                    data: totalViews,
                    borderWidth: 1,
                    borderColor: 'rbg(0, 33, 47)',
                    backgroundColor: 'rbg(255, 99, 132)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
