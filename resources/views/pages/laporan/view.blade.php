@extends('layouts.dashboard')
@section('title', 'Aplikasi Laravel')
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan</h3>
                    <!-- <p class="text-subtitle text-muted">Menu edit data transaksi</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/laporan') }}">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <!-- <div class="card">
                <div class="card-header">
                    
                </div>
            </div> -->

                <div class="card-body">
                <form action="{{ route('laporan.filter') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tanggal">Filter Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="status">Filter Status:</label>
                            <select name="status" class="form-control">
                                <option value="">Semua</option>
                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                <option value="Menunggu Konfirmasi Pembayaran">Menunggu Konfirmasi Pembayaran</option>
                                <option value="Pembayaran Gagal">Pembayaran Gagal</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Dibatalkan">Dibatalkan</option>
                                <!-- Tambahkan pilihan status lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary" style="size:20px">Filter</button>
                        </div>
                    </div>
                </form>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Nama Pemesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @if($dataTransaksi->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Data belum tersedia</td>
                            </tr>
                            @else
                            @foreach ($dataTransaksi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_transaksi }}</td>
                                <td>{{ $data->user->nama }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    @if($data->total_bayar == null)
                                    -
                                    @else
                                    {{ $data->total_bayar }}
                                    @endif
                                </td>
                                <td><span class="badge {{ $data->status_bayar === 'Menunggu Konfirmasi' ? 'bg-warning' : ($data->status_bayar === 'Menunggu Pembayaran' ? 'bg-info' : ($data->status_bayar === 'Menunggu Konfirmasi Pembayaran' ? 'bg-primary' : ($data->status_bayar === 'Pembayaran Gagal' ? 'bg-danger' : ($data->status_bayar === 'Diproses' ? 'bg-secondary' : ($data->status_bayar === 'Dikirim' ? 'bg-dark' : ($data->status_bayar === 'Selesai' ? 'bg-success' : 'bg-secondary')))))) }}">{{ $data->status_bayar }}</span></td>

                                
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection