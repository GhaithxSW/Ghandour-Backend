<x-admin.base-layout>
    <x-slot:pageTitle>التقدم</x-slot>
<div class="container mt-4" style="margin-right: 280px; margin-left: 20px; max-width: calc(100% - 300px); overflow-x: hidden; padding-bottom: 100px;">
        <h4>تقرير تقدم الطفل</h4>

        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>إجمالي المراحل المكتملة</h5>
                    <p class="h3">{{ $totalAchieved }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>إجمالي الوقت المستغرق</h5>
                    <p class="h3">{{ $totalTime }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>إجمالي عدد المحاولات</h5>
                    <p class="h3">{{ $totalAttempts }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>إجمالي عدد المحاولات الفاشلة</h5>
                    <p class="h3">{{ $totalFails }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>إجمالي الوقت بالدقائق</h5>
                    <p class="h3">{{ $totalTimeInMinutes }} دقيقة</p>
                </div>
            </div>
        </div>

        <!-- Scene Progress by Category -->
        <h4 class="mt-4">تفاصيل التقدم حسب الفئات</h4>
        @foreach($categories as $category => $scenes)
            <div class="card mt-3 p-3">
                <h5>{{ $category }}</h5>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>اسم المرحلة</th>
                            <th>الوقت المستغرق</th>
                            <th>عدد المحاولات</th>
                            <th>المحاولات الفاشلة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scenes as $scene)
                            <tr>
                                <td>{{ $scene['name'] }}</td>
                                <td>{{ $scene['time_spent'] }}</td>
                                <td>{{ $scene['attempts'] }}</td>
                                <td>{{ $scene['failed_attempts'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        <!-- Charts -->
        <h4 class="mt-4">إحصائيات بصرية</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="chart-container" style="position: relative; height:40vh; width:100%">
                    <canvas id="completionChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-container" style="position: relative; height:40vh; width:100%">
                    <canvas id="timeSpentChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="chart-container" style="position: relative; height:40vh; width:100%">
                    <canvas id="successRateChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-container" style="position: relative; height:40vh; width:100%">
                    <canvas id="attemptsPerCategoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <x-slot:footerFiles>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("Charts are loading...");

            function createChart(chartId, type, labels, data, backgroundColors, chartLabel = '') {
                var ctx = document.getElementById(chartId);
                if (ctx) {
                    new Chart(ctx, {
                        type: type,
                        data: {
                            labels: labels.length ? labels : ["No Data"],
                            datasets: [{
                                label: chartLabel,
                                data: data.length ? data : [0], // Ensure data is never empty
                                backgroundColor: backgroundColors,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function (tooltipItem) {
                                            let value = tooltipItem.raw;
                                            return chartId === "timeSpentChart" ? `${value} دقيقة` : value;
                                        }
                                    }
                                }
                            }
                        }
                    });
                } else {
                    console.warn(chartId + " Chart: No data available");
                }
            }

            // ✅ Convert timeSpent to minutes
            let timeSpentByCategory = {!! json_encode($timeSpentByCategory) !!} || {};
            let timeSpentInMinutes = Object.values(timeSpentByCategory).map(value => Math.round(value / 60));

            // ✅ Ensure variables always contain data
            let categoryNames = {!! json_encode($categoryNames) !!} || ["No Data"];
            let completedScenes = {!! json_encode($completedScenes) !!} || {};
            let totalAttempts = {!! json_encode($totalAttempts) !!} || 0;
            let totalFails = {!! json_encode($totalFails) !!} || 0;

            // ✅ Convert Objects to Arrays Properly
            let completedScenesArray = Object.values(completedScenes).length ? Object.values(completedScenes) : [0];

            // ✅ Chart Initialization
            createChart("completionChart", "bar", categoryNames, completedScenesArray, ["#007bff"], "عدد المشاهد المكتملة");
            createChart("timeSpentChart", "pie", categoryNames, timeSpentInMinutes, ["#FF6384", "#36A2EB", "#FFCE56", "#4CAF50"], "الوقت المستغرق (دقائق)");
            createChart("successRateChart", "doughnut",
                ["المحاولات الناجحة", "المحاولات الفاشلة"],
                [{!! json_encode($successfulAttempts) !!}, {!! json_encode($totalFails) !!}],
                ["#4CAF50", "#E74C3C"],
                "معدل النجاح (محاولات ناجحة وفاشلة)"
            );
            createChart("attemptsPerCategoryChart", "bar",
                {!! json_encode(array_keys($attemptsPerCategory)) !!},
                {!! json_encode(array_values($attemptsPerCategory)) !!},
                ["#8E44AD"],
                "متوسط عدد المحاولات لكل فئة"
            );
        });
    </script>

    </x-slot>
</x-admin.base-layout>
