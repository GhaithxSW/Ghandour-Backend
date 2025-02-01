<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        <link rel="stylesheet" href="{{ mix('css/light/blog-post.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/blog-post.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/filepond.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/switches.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/switches.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-filepond.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-filepond.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/tagify/tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/contact_us.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/contact_us.css') }}">

        <style>
            @media screen and (max-width: 990px) {
                .font-bg {
                    font-size: 26px;
                }
            }

            @media screen and (max-width: 600px) {
                .font-bg {
                    font-size: 18px;
                }

                .font-bg-btn {
                    font-size: 15px;
                }
            }

            @media screen and (max-width: 300px) {
                .font-bg {
                    font-size: 16px;
                }

                .font-bg-btn {
                    font-size: 14px;
                }
            }

            .dashboard {
                margin-right: 255px;
                margin-left: 15px;
                margin-top: 50px;
                margin-bottom: 30px;
            }
        </style>

    </x-slot>

    <div class="dashboard">

        <div class="container row m-auto">

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/researches">
                    <div class="card bg-dark">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 18px">المراحل المجتازة</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ $totalAchieved }}</b>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/orders">
                    <div class="card bg-secondary">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 18px">وقت اللعب الكلي</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ $totalTime }}</b>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/users">
                    <div class="card bg-primary">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 18px">عدد المحاولات</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ $totalAttempts }}</b>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/members">
                    <div class="card bg-danger">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 18px">عدد المحاولات الفاشلة</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ $totalFails }}</b>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <div class="row mr-3 ml-3 mb-4 mt-4 text">
            <div class="col">
                <div id="piechart" style="width: 450px; height: 250px;" class="mb-4"></div>
            </div>
            <div class="col">
                <div id="chart_div" style="width: 450px; height: 250px;" class="mb-4"></div>
            </div>
        </div>

    </div>

    <x-slot:footerFiles>
        <script src="{{ asset('plugins-rtl/editors/quill/quill.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/filepond.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageCrop.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageResize.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageTransform.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
        <script src="{{ asset('plugins-rtl/tagify/tagify.min.js') }}"></script>
        <script src="{{ asset('resources/rtl/assets/js/apps/ecommerce-create.js') }}"></script>
        <script src="{{ asset('plugins-rtl/leaflet/leaflet.js') }}"></script>
        <script src="{{ asset('plugins-rtl/leaflet/us-states.js') }}"></script>
        <script src="{{ asset('plugins-rtl/leaflet/eu-countries.js') }}"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Type', 'Count', { role: 'link' }],
                    ['وقت اللعب الكلي', <?php echo $totalTimeInMinutes; ?>, '/admin-panel-management/orders'],
                    ['المراحل المجتازة', <?php echo $totalAchieved; ?>, '/admin-panel-management/researches'],
                ]);


                var options = {
                    // title: 'الاحصائيات',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                google.visualization.events.addListener(chart, 'select', function () {
                    var selection = chart.getSelection();
                    if (selection.length > 0) {
                        var row = selection[0].row;
                        var url = data.getValue(row, 2);
                        window.location.href = url;
                    }
                });

                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Pizza');
                data.addColumn('number', 'Populartiy');
                data.addColumn(['string', 'Link']);
                data.addRows([
                    ['عدد المحاولات', <?php echo 99; ?>, '/admin-panel-management/users'],
                    ['عدد المحاولات الفاشلة', <?php echo 99; ?>, '/admin-panel-management/members']
                ]);

                var options = {
                    // title: 'وقت اللعب الكلي',
                    // sliceVisibilityThreshold: .2,
                    // colors: ['green', 'orange', 'red', 'lightgray']
                    colors: ['green', 'orange', 'red']
                };

                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

                google.visualization.events.addListener(chart, 'select', function () {
                    var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var link = data.getValue(selectedItem.row, 2);
                        window.open(link);
                    }
                });

                chart.draw(data, options);
            }
        </script>

        <script type="text/javascript">
            google.charts.load("current", {
                packages: ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['User Type', 'Count', {
                        role: 'style',
                    }, {
                        role: 'link'
                    }],
                    ['الأبحاث', <?php echo $totalAchieved; ?>, '#b87333', '/admin-panel-management/researches'],
                    ['وقت اللعب الكلي', <?php echo $totalAttempts; ?>, '#b87333', '/admin-panel-management/orders'],
                    ['عدد المحاولات', <?php echo 15.5; ?>, '#b87333', '/admin-panel-management/users'],
                    ['عدد المحاولات الفاشلة', <?php echo 33; ?>, 'silver', '/admin-panel-management/members'],
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {
                        calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"
                    },
                    2
                ]);

                var options = {
                    title: "Users",
                    width: 600,
                    height: 400,
                    bar: {
                        groupWidth: "95%"
                    },
                    legend: {
                        position: "none"
                    },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));

                google.visualization.events.addListener(chart, 'select', function () {
                    var selection = chart.getSelection();
                    if (selection.length > 0) {
                        var row = selection[0].row;
                        var url = data.getValue(row, 3);
                        window.location.href = url;
                    }
                });

                chart.draw(view, options);
            }
        </script>

    </x-slot>

</x-admin.base-layout>
