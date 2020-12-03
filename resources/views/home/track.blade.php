@extends('layouts.home')

@section('section-title')
    Progress
@endsection

@section('content')
    <div class="mental-progress">
        <div id="chart-container"></div>
        <h4 class="mt-5">Progress Report</h4>
        <div class="progress-report">
            <table class="table">
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{$log->mood_level}}/10</td>
                        <td>{{$log->created_at->toFormattedDateString()}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
            var dataPoints = {!!$dataPoints!!};
            for(var i = 0; i < dataPoints.length; i++) {
                dataPoints[i].x = new Date(dataPoints[i].x);
            }
            console.log(dataPoints);
            var chart = new CanvasJS.Chart("chart-container", {
                animationEnabled: true,
                theme: "light2",
                axisX:{
                    valueFormatString: "DD MMM",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                data: [{
                    type: "line",
                    xValueFormatString: "DD MMM, YYYY",
                    dataPoints: dataPoints
                }]
            });
            chart.render();

        }
    </script>
@endsection
