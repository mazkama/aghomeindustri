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
                    <h3>Data Transaksi</h3>
                    <p class="text-subtitle text-muted">Menu edit data transaksi</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Kelola Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Kelola Transaksi
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Nama Pemesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
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

                                <td>
                                    
                                    <form action="{{ route('kelolaTransaksi.delete', $data->id_transaksi) }}" method="post">
                                        @csrf
                                        <a href="{{ route('kelolaTransaksi.edit', $data->id_transaksi) }}" class="btn btn-warning"><i class="bi bi-pencil-square" aria-hidden="true"></i></a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')"><i class="bi bi-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>

                                
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