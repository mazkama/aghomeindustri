@extends('layouts.dashboard')
@section('title', 'Aplikasi Laravel')
@section('content')
@include('modal.modalMtdPembayaran', ['metode_pembayaran' => $dataMtd])
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
                    <h3>Data Metode Pembayaran</h3>
                    <p class="text-subtitle text-muted"><br></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Kelola Metode Pembayaran</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <!-- <div class="card-header">
                    Kelola Metode Pembayaran
                </div> -->
                <div class="card-body">
                <p align="right" style="padding-right:10px">
                    <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#TambahMP">Tambah Metode Pembayaran
                    </a>
                </p>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Metode Pembayaran</th>                                
                                <th>Nama Virtual Account</th>
                                <th>No. Virtual Account</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMtd as $data)
                            <tr> 
                                <td>{{ $data->id_mtd_pembayaran }}</td>
                                <td>{{ $data->nama_mtd_pembayaran }}</td>
                                <td>{{ $data->atas_nama_mtd_pembayaran }}</td>
                                <td>{{ $data->no_rek_mtd_pembayaran }}</td>
                                <td>
                                    <form action="{{ route('hapus-mp', $data->id_mtd_pembayaran) }}" method="post">
                                        @csrf
                                        <a href="{{ route('edit-mp', $data->id_mtd_pembayaran) }}" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#inlineForm{{ $data->id_mtd_pembayaran }}">
                                            <i class="fa-fw select-all fas"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection