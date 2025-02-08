<x-admin.base-layout>
    <x-slot:pageTitle>التقدم</x-slot>

    <x-slot:headerFiles>
        <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
    </x-slot>
    <div class="container mt-4">
        <h4>تقرير تقدم الطفل</h4>
        <div class="row">
            <div class="col-md-6">
                <canvas id="completionChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="timeSpentChart"></canvas>
            </div>
        </div>
    </div>
    <x-slot:footerFiles>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var completionChart = new Chart(document.getElementById('completionChart'), {
                type: 'bar',
                data: {
                    labels: {!! json_encode($categories) !!},
                    datasets: [{
                        label: 'المراحل المكتملة',
                        data: {!! json_encode($completedScenes) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }]
                }
            });

            var timeSpentChart = new Chart(document.getElementById('timeSpentChart'), {
                type: 'pie',
                data: {
                    labels: {!! json_encode($categories) !!},
                    datasets: [{
                        label: 'الوقت المستغرق (دقائق)',
                        data: {!! json_encode($timeSpent) !!},
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50']
                    }]
                }
            });
        </script>
    </x-slot>
    <x-slot:footerFiles>
        <script src="{{ asset('plugins-rtl/editors/quill/quill.js') }}"></script>
    </x-slot>
</x-admin.base-layout>
