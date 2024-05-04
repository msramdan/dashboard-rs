@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Dashboard') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Di bawah ini adalah daftar semua Dashboard.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-3">
                                <a href="{{ route('dashboard_kunjungan_pasien') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Dashboard Kunjungan Pasien</button>
                                </a>
                                <a href="{{ route('dashboard_penyakit') }}" >
                                    <button class="btn btn-primary btn-block" type="button">Dashboard Pennyakit</button>
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
