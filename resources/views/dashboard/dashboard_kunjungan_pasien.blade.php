@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Dashboard') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Di bawah ini adalah dashboard kunjungan pasien') }}
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" aria-describedby="addon-wrapping"
                                            id="daterange-btn" value="">
                                        <input type="hidden" name="start_date" id="start_date"
                                            value="{{ $microFrom ?? '' }}">
                                        <input type="hidden" name="end_date" id="end_date" value="{{ $microTo ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 1 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Poliklinik
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Pos</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <!-- Data akan ditambahkan melalui JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 2 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Kelas
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Kelas</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody2">
                                        <!-- Data akan ditambahkan melalui JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 3 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Dokter
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px; ">
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody3">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 4 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Dokter
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px; ">
                                <canvas id="myChart4"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody4">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 5 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Cara Bayar
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px; ">
                                <canvas id="myChart5"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cara bayar</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody5">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 6 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Cara Bayar
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px; ">
                                <canvas id="myChart6"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cara bayar</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody6">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- 7 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Jenis Kelamin
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart7"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Kelas</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody7">
                                        <!-- Data akan ditambahkan melalui JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 8 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Jenis Kelamin
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart8"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenis kelamin</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody8">
                                        <!-- Data akan ditambahkan melalui JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 9 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Kelompok Umur
                            </h4>
                        </div>
                        <div class="card-body">
                            <div style="width: 100%;height: 500px">
                                <canvas id="myChart9"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 10 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Kelompok Umur
                            </h4>
                        </div>
                        <div class="card-body">
                            <div style="width: 100%;height: 500px">
                                <canvas id="myChart10"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 11 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Agama
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart11"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Agama</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody11">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 12 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Agama
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart12"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Agama</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody12">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 13 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat jalan by Pekerjaan
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart13"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pekerjaan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody13">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 14 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Pekerjaan
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart14"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pekerjaan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody14">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 15 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Desa
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart15"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Desa</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody15">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 16 --}}
                <div class="col-sm-6 col-sm-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                Kunjungan rawat inap by Desa
                            </h4>
                        </div>
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 300px;">
                                <canvas id="myChart16"></canvas>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px; overflow-y: auto;">
                                <table class="table mt-4 table-striped table-bordered"
                                    style="line-height: 0px; font-size:10px">
                                    <thead>
                                        <tr>
                                            <th scope="col">Desa</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">%</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody16">
                                    </tbody>
                                </table>
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
    {{-- 1 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_poliklinik',
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
                        labels.push(item.namapost);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody').append('<tr><td>' + item.namapost + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 2 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_kelas',
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
                        labels.push(item.kelas);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody2').append('<tr><td>' + item.kelas + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx2 = document.getElementById("myChart2").getContext('2d');
                    var myChart = new Chart(ctx2, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 3 --}}
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
                        $('#tableBody3').append('<tr><td>' + item.nadokter + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the bar chart with the processed data
                    var ctx3 = document.getElementById("myChart3").getContext('2d');
                    var myChart3 = new Chart(ctx3, {
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
    {{-- 4 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_dokter',
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
                        $('#tableBody4').append('<tr><td>' + item.nadokter + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the bar chart with the processed data
                    var ctx4 = document.getElementById("myChart4").getContext('2d');
                    var myChart4 = new Chart(ctx4, {
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
    {{-- 5 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_cara_bayar',
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
                        var labelToShow = (item.jenispas === "PAS1") ? "Umum" : item.cust_nama;
                        labels.push(labelToShow);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each bar
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        var tableLabel = (item.jenispas === "PAS1") ? "Umum" : item.cust_nama;
                        $('#tableBody5').append('<tr><td>' + tableLabel + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the bar chart with the processed data
                    var ctx5 = document.getElementById("myChart5").getContext('2d');
                    var myChart5 = new Chart(ctx5, {
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
    {{-- 6 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_cara_bayar',
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
                        var labelToShow = (item.jenispas === "PAS1") ? "Umum" : item.cust_nama;
                        labels.push(labelToShow);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                        2); // Menggunakan 2 digit desimal
                        // Add random background colors for each bar
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        var tableLabel = (item.jenispas === "PAS1") ? "Umum" : item.cust_nama;
                        $('#tableBody6').append('<tr><td>' + tableLabel + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the bar chart with the processed data
                    var ctx6 = document.getElementById("myChart6").getContext('2d');
                    var myChart6 = new Chart(ctx6, {
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
    {{-- 7 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_jenis_kelamin',
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


                    data.forEach(function(item) {
                        labels.push(item.jenis_kelamin == 1 ? 'Pria' : 'Wanita');
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody7').append('<tr><td>' + (item.jenis_kelamin == 1 ?
                                'Pria' : 'Wanita') + '</td><td>' + item.jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx7 = document.getElementById("myChart7").getContext('2d');
                    var myChart = new Chart(ctx7, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 8 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_jenis_kelamin',
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

                    data.forEach(function(item) {
                        labels.push(item.jenis_kelamin == 1 ? 'Pria' : 'Wanita');
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody8').append('<tr><td>' + (item.jenis_kelamin == 1 ?
                                'Pria' : 'Wanita') + '</td><td>' + item.jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx8 = document.getElementById("myChart8").getContext('2d');
                    var myChart = new Chart(ctx8, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 9 --}}
    <script>
        var ctx9 = document.getElementById("myChart9").getContext('2d');
        var myChart = new Chart(ctx9, {
            type: 'pie',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 23, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    {{-- 10 --}}
    <script>
        var ctx10 = document.getElementById("myChart10").getContext('2d');
        var myChart = new Chart(ctx10, {
            type: 'pie',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 23, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    {{-- 11 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_agama',
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
                        labels.push(item.agama);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody11').append('<tr><td>' + item.agama + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx11 = document.getElementById("myChart11").getContext('2d');
                    var myChart = new Chart(ctx11, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 12 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_agama',
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
                        labels.push(item.agama);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody12').append('<tr><td>' + item.agama + '</td><td>' + item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx12 = document.getElementById("myChart12").getContext('2d');
                    var myChart = new Chart(ctx12, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 13 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_pekerjaan',
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
                        labels.push(item.pekerjaan);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody13').append('<tr><td>' + item.pekerjaan + '</td><td>' +
                            item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx13 = document.getElementById("myChart13").getContext('2d');
                    var myChart = new Chart(ctx13, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 14 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_pekerjaan',
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
                        labels.push(item.pekerjaan);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody14').append('<tr><td>' + item.pekerjaan + '</td><td>' +
                            item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx14 = document.getElementById("myChart14").getContext('2d');
                    var myChart = new Chart(ctx14, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 15 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_jalan_by_desa',
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
                        labels.push(item.kelurahan);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody15').append('<tr><td>' + item.kelurahan + '</td><td>' +
                            item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx15 = document.getElementById("myChart15").getContext('2d');
                    var myChart = new Chart(ctx15, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- 16 --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/grafik_rawat_inap_by_desa',
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
                        labels.push(item.kelurahan);
                        datasetData.push(item.jumlah);
                        // Hitung persentase
                        var percentage = ((item.jumlah / total) * 100).toFixed(
                            2); // Menggunakan 2 digit desimal
                        // Add random background colors for each pie slice
                        backgroundColor.push(getRandomRGBA());
                        // Append data to table
                        $('#tableBody16').append('<tr><td>' + item.kelurahan + '</td><td>' +
                            item
                            .jumlah +
                            '</td><td>' + percentage + '%</td></tr>');
                    });

                    // Create the pie chart with the processed data
                    var ctx16 = document.getElementById("myChart16").getContext('2d');
                    var myChart = new Chart(ctx16, {
                        type: 'pie',
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
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
