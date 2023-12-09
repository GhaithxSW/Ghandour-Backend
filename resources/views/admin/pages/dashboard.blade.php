<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        {{-- @vite(['resources/rtl/scss/light/assets/apps/blog-post.scss']) --}}
        {{-- @vite(['resources/rtl/scss/dark/assets/apps/blog-post.scss']) --}}
        @vite(['resources/scss/light/assets/apps/blog-post.scss'])
        @vite(['resources/scss/dark/assets/apps/blog-post.scss'])

        @vite(['resources/rtl/scss/light/assets/components/modal.scss'])
        @vite(['resources/rtl/scss/dark/assets/components/modal.scss'])
        @vite(['resources/scss/light/assets/components/modal.scss'])
        @vite(['resources/scss/dark/assets/components/modal.scss'])

        @vite(['public/plugins-rtl/filepond/filepond.min.css'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImagePreview.min.css'])
        @vite(['public/plugins-rtl/tagify/tagify.css'])
        @vite(['resources/rtl/scss/light/assets/forms/switches.scss'])
        @vite(['resources/rtl/scss/dark/assets/forms/switches.scss'])
        @vite(['resources/rtl/scss/light/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/rtl/scss/dark/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/rtl/scss/light/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/rtl/scss/dark/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/rtl/scss/light/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/rtl/scss/dark/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/rtl/scss/light/assets/apps/ecommerce-create.scss'])
        @vite(['resources/rtl/scss/dark/assets/apps/ecommerce-create.scss'])
        @vite(['public/plugins-rtl/leaflet/leaflet.css'])
        @vite(['resources/rtl/scss/light/assets/pages/contact_us.scss'])
        @vite(['resources/rtl/scss/dark/assets/pages/contact_us.scss'])

        {{-- <link rel="stylesheet" href="{{ asset('plugins/apex/apexcharts.css') }}"> --}}

        {{-- @vite(['resources/scss/light/assets/components/list-group.scss']) --}}
        {{-- @vite(['resources/scss/light/assets/widgets/modules-widgets.scss']) --}}

        {{-- @vite(['resources/scss/dark/assets/components/list-group.scss']) --}}
        {{-- @vite(['resources/scss/dark/assets/widgets/modules-widgets.scss']) --}}

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
                            <p class="card-title mb-3" style="font-size: 20px">الابحاث</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ count($researches) }}</b>
                            </p>
                        </div>
                        <div class="card-footer px-4 pt-0 border-0">
                            <p>اضغط هنا لرؤية الابحاث</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/orders">
                    <div class="card bg-secondary">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 20px">الطلبات</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ count($orders) }}</b>
                            </p>
                        </div>
                        <div class="card-footer px-4 pt-0 border-0">
                            <p>اضغط هنا لرؤية الطلبات</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/users">
                    <div class="card bg-primary">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 20px">المستخدمين</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ count($users) }}</b>
                            </p>
                        </div>
                        <div class="card-footer px-4 pt-0 border-0">
                            <p>اضغط هنا لرؤية المستخدمين</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <a href="/admin-panel-management/members">
                    <div class="card bg-danger">
                        <div class="card-body pt-3">
                            <p class="card-title mb-3" style="font-size: 20px">الموظفين</p>
                            <p class="card-text text-center" style="font-size: 25px">
                                <b>{{ count($members) }}</b>
                            </p>
                        </div>
                        <div class="card-footer px-4 pt-0 border-0">
                            <p>اضغط هنا لرؤية الموظفين</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>



        {{-- <div class="container mt-4 row">
            <div id="columnchart" style="width: 800px; height: 400px; margin-right: 200px"></div>
        </div> --}}

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
        @vite(['public/plugins-rtl/editors/quill/quill.js'])
        @vite(['public/plugins-rtl/filepond/filepond.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginFileValidateType.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageExifOrientation.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImagePreview.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageCrop.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageResize.min.js'])
        @vite(['public/plugins-rtl/filepond/FilePondPluginImageTransform.min.js'])
        @vite(['public/plugins-rtl/filepond/filepondPluginFileValidateSize.min.js'])
        @vite(['public/plugins-rtl/tagify/tagify.min.js'])
        @vite(['resources/rtl/assets/js/apps/ecommerce-create.js'])
        @vite(['public/plugins-rtl/leaflet/leaflet.js'])
        @vite(['public/plugins-rtl/leaflet/us-states.js'])
        @vite(['public/plugins-rtl/leaflet/eu-countries.js'])

        {{-- <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script> --}}
        {{-- <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script> --}}
        {{-- @vite(['resources/assets/js/widgets/modules-widgets.js']) --}}


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Type', 'Count', {
                        role: 'link'
                    }],
                    ['الطلبات', <?php echo count($orders); ?>, '/admin-panel-management/orders'],
                    ['الابحاث', <?php echo count($researches); ?>, '/admin-panel-management/researches'],
                ]);

                var options = {
                    // title: 'الاحصائيات',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                google.visualization.events.addListener(chart, 'select', function() {
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
                    ['المستخدمين', <?php echo count($users); ?>, '/admin-panel-management/users'],
                    ['الأدمن', <?php echo count($admins); ?>, '/admin-panel-management/admins'],
                    ['الموظفين', <?php echo count($members); ?>, '/admin-panel-management/members']
                ]);

                var options = {
                    // title: 'الطلبات',
                    // sliceVisibilityThreshold: .2,
                    // colors: ['green', 'orange', 'red', 'lightgray']
                    colors: ['green', 'orange', 'red']
                };

                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

                google.visualization.events.addListener(chart, 'select', function() {
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
                    ['الأبحاث', <?php echo count($researches); ?>, '#b87333', '/admin-panel-management/researches'],
                    ['الطلبات', <?php echo count($orders); ?>, '#b87333', '/admin-panel-management/orders'],
                    ['المستخدمين', <?php echo count($users); ?>, '#b87333', '/admin-panel-management/users'],
                    ['الموظفين', <?php echo count($members); ?>, 'silver', '/admin-panel-management/members'],
                    ['الأدمن', <?php echo count($admins); ?>, 'silver', '/admin-panel-management/admins'],
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

                google.visualization.events.addListener(chart, 'select', function() {
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
