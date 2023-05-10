@extends('theme.default')

@section('heading')
    المنشورات الأكثر مشاهدة
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="videos-table" class="table table-striped text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>اسم المنشور</th>
                        <th>اسم المستخدم</th>
                        <th>عدد المشاهدات</th>
                        <th>تاريخ النشر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($mostViewedVideos as $view)
                        <tr>
                            <td><a href="/videos/{{$view->video->id}}">{{ $view->video->title }}</a></td>
                            <td>{{ $view->user->name }}</td>
                            <td>{{ $view->views_number }}</td>
                            <td>
                                <p>{{ $view->video->created_at->diffForHumans() }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <canvas id="myChart" class="mt-4"></canvas>
    </div>
@endsection

@section('script')
    <script>
        var names = <?php echo $videoNames; ?>;
        var totalViews = <?php echo $videoViews; ?>;

        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'المنشورات الاكثر مشاهدة',
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



