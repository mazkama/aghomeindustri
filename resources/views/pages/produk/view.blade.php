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
                    <h3>Data Produk</h3>
                    <p class="text-subtitle text-muted">Menu edit data produk</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Kelola Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Kelola Produk
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr> 
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Ukuran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataProduk as $data)
                            <tr> 
                                <td><img src="{{ asset('storage/' . $data->foto) }} " width="100" height="100" alt=""></td>
                                <td>{{ $data->nama_produk }}</td>
                                <td>{{ $data->deskripsi_produk }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->ukuran }}</td>
                                <td>
                                    <form action="{{ route('produk.delete', $data->kode_produk) }}" method="post">
                                        @csrf
                                        <a href="{{ route('produk.edit', $data->kode_produk) }}" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#editProduk{{$data->kode_produk}}">
                                            <i class="fa-fw select-all fas"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                    @include('modal.modalProduk',['dataProduk'=>$data])
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