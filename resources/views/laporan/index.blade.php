@extends('layouts.app')

@section('title', __('Laporan'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Laporan') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Di bawah ini adalah daftar semua laporan.') }}
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-3">
                                <a href="{{ route('kunjungan_pasien_per_diagnosa') }}" >
                                    <button class="btn btn-primary btn-block" type="button"> Kunjungan Pasien Perdiagnosa </button>
                                </a>
                                <a href="{{ route('kunjungan_pasien') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Kunjungan Pasien</button>
                                </a>
                                <a href="{{ route('data_rujukan_pasien') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Data Rujukan Pasien</button>
                                </a>
                                <a href="{{ route('data_surat_sakit') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Data Surat Sakit</button>
                                </a>
                                <a href="{{ route('data_surat_sehat') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Data Surat Sehat </button>
                                </a>
                                <a href="{{ route('pasien_kunjungan_sakit_dan_kunjungan_sehat') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Pasien Kunjungan Sakit dan Kunjungan Sehat </button>
                                </a>
                                <a href="{{ route('laporan_summary_mcu') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Laporan Summary MCU </button>
                                </a>
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
@endpush
