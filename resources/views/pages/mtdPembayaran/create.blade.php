@extends('layouts.dashboard')
@section('title','Aplikasi Laravel')
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
                    <h3>Kelola Data Produk</h3>
                    <p class="text-subtitle text-muted">Menu tambah data produk.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Kelola Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Produk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="{{ old('nama_produk') }}">
                                    @error('nama_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="stok">Stok Produk</label>
                                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Masukkan Stok Produk" value="{{ old('stok') }}">
                                    @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="harga">Harga Produk</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan Harga Produk" value="{{ old('harga') }}">
                                    @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="formFile" class="form-label">Foto Produk</label>
                                    <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" id="formFile">
                                    @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <fieldset class="form-group">
                                    <label for="ukuran">Ukuran Produk</label>
                                    <select class="form-select @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran">
                                        <option value="" disabled selected>-- Pilih Ukuran --</option>
                                        <option value="15x15 Cm" {{ old('ukuran') == '15x15 Cm' ? 'selected' : '' }}>15x15 Cm</option>
                                        <option value="20x30 Cm" {{ old('ukuran') == '20x30 Cm' ? 'selected' : '' }}>20x30 Cm</option>
                                        <option value="15x30 Cm" {{ old('ukuran') == '15x30 Cm' ? 'selected' : '' }}>15x30 Cm</option>
                                    </select>
                                    @error('ukuran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                                <div class="form-group mb-3">
                                    <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                    <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" id="deskripsi_produk" name="deskripsi_produk" rows="3">{{ old('deskripsi_produk') }}</textarea>
                                    @error('deskripsi_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto"><i data-feather="edit"></i>Tambah</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection