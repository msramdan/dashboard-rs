@extends('layouts.app')

@section('title', __('Laporan'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Laporan') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Di bawah ini adalah laporan summary mcu') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Laporan') }}</li>
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
                                <div class="col-md-2">
                                    <button id="btnExport" class="btn btn-success  mb-3">
                                        <i class='fas fa-file-excel'></i>
                                        {{ __('Export') }}
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="data-table" style="font-size: 12px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No reg</th>
                                            <th>Rekmed</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Pasien</th>
                                            <th>Suhu</th>
                                            <th>Keluhan</th>
                                            {{-- <th>Pemeriksaan</th> --}}
                                            <th>Diagnosa</th>
                                            <th>No Suarat</th>
                                            <th>Dokter</th>


                                        </tr>
                                    </thead>
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

    <script>
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'noreg',
                name: 'noreg'
            },
            {
                data: 'rekmed',
                name: 'tbl_rekammedisrs.rekmed'
            },
            {
                data: 'tglmasuk',
                name: 'tbl_rekammedisrs.tglmasuk'
            },
            {
                data: 'namapas',
                name: 'tbl_pasien.namapas'
            },
            {
                data: 'suhu',
                name: 'tbl_rekammedisrs.suhu'
            },
            {
                data: 'keluhanawal',
                name: 'tbl_rekammedisrs.keluhanawal'
            },
            // {
            //     data: 'pfisik',
            //     name: 'tbl_rekammedisrs.pfisik'
            // },
            {
                data: 'diagnosa',
                name: 'tbl_rekammedisrs.diagnosa'
            },
            {
                data: 'surat1',
                name: 'tbl_rekammedisrs.surat1'
            },
            {
                data: 'nadokter',
                name: 'tbl_dokter.nadokter'
            },


        ];


        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('laporan_summary_mcu') }}",
                data: function(s) {
                    s.start_date = $("#start_date").val();
                    s.end_date = $("#end_date").val();
                }
            },
            columns: columns
        });


        function replaceURLParams() {
            var params = new URLSearchParams();
            var startDate = $("#start_date").val();
            var endDate = $("#end_date").val();
            if (startDate) params.set('start_date', startDate);
            if (endDate) params.set('end_date', endDate);
            var newURL = "{{ route('laporan_summary_mcu') }}" + '?' + params.toString();
            history.replaceState(null, null, newURL);
        }

        $('#daterange-btn').change(function() {
            table.draw();
            replaceURLParams()
        })
    </script>

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
        $(document).on('click', '#btnExport', function(event) {
            event.preventDefault();
            exportData();

        });

        var exportData = function() {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var url = '/export-data_summary_mcu/' + start_date + '/' + end_date;
            console.log(url);
            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: {
                    start_date: start_date,
                    end_date: end_date,
                },
                xhrFields: {
                    responseType: 'blob'
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please Wait !',
                        html: 'Sedang melakukan proses export data', // add html attribute if you want or remove
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });
                },
                success: function(data) {
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(data);
                    var nameFile = 'Laporan Data Summary Mcu.xlsx'
                    console.log(nameFile)
                    link.download = nameFile;
                    link.click();
                    swal.close()
                },
                error: function(data) {
                    console.log(data)
                    Swal.fire({
                        icon: 'error',
                        title: "Data export failed",
                        text: "Please check",
                        allowOutsideClick: false,
                    })
                }
            });
        }
    </script>
@endpush
