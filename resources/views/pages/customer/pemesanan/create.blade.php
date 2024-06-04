@extends('layouts.master')
@section('title', 'AG Home Industri')
@section('content')
 

<div class="container my-4">
    <h4><b>Buat Pesanan</b></h4>
    <section class="section mt-3">
        <div class="card">
            <div class="card-header bg-success">
                <h4 class="card-title pt-2 text-center">ID Pesanan # {{$id_pemesanan}}</h4>
            </div>
            <div class="table-responsive" style="max-height: 200px; overflow-y: auto;">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr class="table-success">
                            <th>No</th>
                            <th>Foto Produk</th>
                            <th>Nama Produk</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @if($dataKeranjang->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Data belum tersedia</td>
                        </tr>
                        @else
                        @foreach ($dataKeranjang as $item)
                        @php 
                        $total += $item->harga;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $item->produk->foto) }}" width="100" height="100" alt=""></td>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->produk->ukuran }}</td>
                            <td>{{ $item->produk->harga }}</td>
                            <td>{{ $item->jumlah_produk }}</td>
                            <td>{{ $item->harga }}</td>  
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('transaksi.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @php
                    $biayaPengiriman = 25000; 
                    @endphp
                    <input type="hidden" name="id_pesanan" value="{{ $id_pemesanan }}"> <!-- Input tak terlihat untuk ID pesanan -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_penerima">Nama Penerima</label>
                                <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" name="nama_penerima" placeholder="Masukkan Nama Penerima" value="{{ $user->nama }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nomor_hp">Nomor HP</label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor HP" value="{{ $user->nohp }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3" readonly>{{ $user->alamat }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="subtotal_produk">Subtotal Produk</label>
                                <input type="text" class="form-control @error('subtotal_produk') is-invalid @enderror" id="subtotal_produk" name="subtotal_produk" placeholder="Masukkan Subtotal Produk" value="{{ $total }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success ml-auto w-50"><i data-feather="edit"></i>Tambah</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </section>
</div>

@endsection
