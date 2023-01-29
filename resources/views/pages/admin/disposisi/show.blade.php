@extends('layouts.admin')

@section('title')
    Detail Surat
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                Detail Surat
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Surat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
            <div class="row gx-4">
                <div class="col-lg-10 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">Detail Surat
                            <a href="{{ route('download-surat', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Surat
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>No.Surat</th>
                                            <td>{{ $item->letter->letter_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surat Dari</th>
                                            <td>{{ $item->agency->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Surat</th>
                                            <td>{{ Carbon\Carbon::parse($item->tgl_surat)->translatedFormat('l, d F Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>No. Agenda</th>
                                            <td>{{ $item->letter->agenda_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Diterima</th>
                                            <td>{{ Carbon\Carbon::parse($item->tgl_diterima)->translatedFormat('l, d F Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Penyelesaian</th>
                                            <td>{{ Carbon\Carbon::parse($item->tgl_penyelesaian)->translatedFormat('l, d F Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Hal</th>
                                            <td>{{ $item->hal }}</td>
                                        </tr>
                                        <tr>
                                            <th>Diteruskan Kepada</th>
                                            <td>{{ $item->diteruskan_kpd }}</td>
                                        </tr>
                                        <tr>
                                            <th>Instruksi/Informan</th>
                                            <td>{{ $item->instruksi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
