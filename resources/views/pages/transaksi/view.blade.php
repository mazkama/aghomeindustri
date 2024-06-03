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
                            <tr>
                                <td>1</td>
                                <td>8439236429834</td>
                                <td>Alan Sanjaya</td>
                                <td>21-12-20024</td>
                                <td>Rp. 200000</td>
                                <td>Belum Dibayar</td>
                                <td>
                                    <a href="" class="btn btn-warning"><i class="bi bi-pencil-square" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>8439236429834</td>
                                <td>Alan Sanjaya</td>
                                <td>21-12-20024</td>
                                <td>Rp. 200000</td>
                                <td><span class="badge bg-success">Belum Dibayar</span></td>
                                <td>
                                    <a href="" class="btn btn-warning"><i class="bi bi-pencil-square" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>8439236429834</td>
                                <td>Alan Sanjaya</td>
                                <td>21-12-20024</td>
                                <td>Rp. 200000</td>
                                <td>Belum Dibayar</td>
                                <td>
                                    <a href="" class="btn btn-warning"><i class="bi bi-pencil-square" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection