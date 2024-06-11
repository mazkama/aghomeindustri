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
                    <h3>Pengaturan</h3>
                    <p class="text-subtitle text-muted">Menu Pengaturan Akun.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <p>Pengaturan</p>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Biodata Diri</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Pangguna</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Pengguna" value="{{ old('nama') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nohp">Nomor Hp</label>
                                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" placeholder="Masukkan Nomor Hp" value="{{ old('nohp') }}">
                                    @error('nohp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
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
        </section> -->
        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Biodata Diri</h4>
                        </div>
                        <div class="card-content" style="margin-top: -30px;">
                            @if(Auth::check())
                            <div class="card-body">
                                <form action="{{ route('admin.update-profile') }}" method="POST" class="form form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama" class="form-control" name="nama" value="{{ Auth::user()->nama }}">
                                                @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nomor Hp</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" id="nohp" class="form-control" name="nohp" value="{{ Auth::user()->nohp }}">
                                                @error('nohp')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="alamat" class="form-control" name="alamat" value="{{ Auth::user()->alamat }}">
                                                @error('alamat')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update
                                                    Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Atur Ulang Kata Sandi</h4>
                        </div>
                        <div class="card-content" style="margin-top: -30px;">
                            <div class="card-body">
                                <form action="{{ route('admin.update-password') }}" method="POST" class="form form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Password Sebelumnya</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" id="old_password" class="form-control" name="old_password" placeholder="Masukan Password Lama">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Password Baru</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Masukan Password Baru">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Konfirmasi Password</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Masukan Password Konfirmasi ">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update
                                                    Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->
    </div>
</div>
@endsection