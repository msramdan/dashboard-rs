@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Dashboard') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Di bawah ini adalah dashboard penyakit') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label for="">Filter tanggal</label>
                                            <div class="input-group mb-4">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" aria-describedby="addon-wrapping"
                                                    id="daterange-btn" value="">
                                                <input type="hidden" name="start_date" id="start_date"
                                                    value="{{ $microFrom ?? '' }}">
                                                <input type="hidden" name="end_date" id="end_date"
                                                    value="{{ $microTo ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Top Penyakit</label>
                                            <select name="tgl_daftar" id="tgl_daftar" class="form-control ">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">layanan</label>
                                            <select name="area_coverage" id="area_coverage" class="form-control  ">
                                                <option value="All">All
                                                </option>
                                                <option value="1">Rawat Jalan</option>
                                                <option value="2">Rawat Inap</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Unit</label>
                                            <select name="status" id="status" class="form-control  ">
                                                <option value="All">All
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Daftar 10 besar penyakit
                                        </h4>
                                    </div>
                                    <div class="card-body"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        <canvas id="myChart" style="height: 500px"></canvas>
                                    </div>
                                    <div class="card-body">
                                        <div style="height: 400px; overflow-y: auto;">
                                            <table class="table mt-4 table-striped table-bordered"
                                                style="font-size:11px">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Dokter</th>
                                                        <th scope="col">Jumlah</th>
                                                        <th scope="col">%</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
    <link href="{{ asset('mazer/css/daterangepicker.min.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
    <script type="text/javascript" src="{{ asset('mazer/js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('mazer/js/daterangepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        var start = {{ $microFrom }}
        var end = {{ $microTo }}
        var label = '';
        $('#daterange-btn').daterangepicker({
                locale: {
                    format: 'DD MMM YYYY'
                },
                startDate: moment(start),
                endDate: moment(end),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                        'month')],
                }
            },
            function(start, end, label) {
                $('#start_date').val(Date.parse(start));
                $('#end_date').val(Date.parse(end));
                if (isDate(start)) {
                    $('#daterange-btn span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
                }
            });

        function isDate(val) {
            var d = Date.parse(val);
            return Date.parse(val);
        }
    </script>
    <script>
        function getRandomRGBA() {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            var a = Math.random().toFixed(2); // Alpha between 0 and 1
            return 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';
        }
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_dokter',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var total = 0; // total jumlah
                    var labels = [];
                    var datasetData = [];
                    var backgroundColor = [];

                    // Menghitung total jumlah
                    data.forEach(function(item) {
                        total += item.jumlah;
                    });

                    // Process the data received from the server
                    data.forEach(function(item) {
                        labels.push(item.nadokter);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each bar
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody').append('<tr><td>' + item.nadokter + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the bar chart with the processed data
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: '# of Votes',
                                data: datasetData,
                                backgroundColor: backgroundColor,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false
                                },
                            },
                            responsive: true, // Mengizinkan grafik menyesuaikan ukuran
                            maintainAspectRatio: false, // Tidak mempertahankan aspek rasio
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
