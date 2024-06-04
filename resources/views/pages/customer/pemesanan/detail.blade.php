@extends('layouts.master')
@section('title', 'AG Home Industri')
@section('content')

<div class="container my-4">
    <h4><b>Detail Transaksi</b></h4>
    <section class="section mt-3 ">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="p-3 text-center text-white">Status {{ $transaksi->status_bayar }}</h4>
                <div class="form-group text-center m-3">

                    @if ($transaksi->status_bayar == "Menunggu Pembayaran" || $transaksi->status_bayar == "Pembayaran Gagal")
                    <form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <a href="{{ route('pembayaran.create', $transaksi->id_transaksi) }}" class="btn btn-outline-primary ml-auto w-50 d-inline-block mb-2" data-bs-toggle="modal" data-bs-target="#inlineForm">
                            Bayar Pesanan
                        </a>
                        <button type="submit" class="btn btn-outline-danger ml-auto w-50 d-inline-block">
                            Batalkan Pesanan
                        </button>
                    </form> 
                    @endif

                </div>

                @include('modal.modalPembayaran')
            </div>
            <div class="card-header bg-success">
                <h4 class="card-title pt-2 text-center">ID Transaksi #{{$transaksi->id_transaksi}}</h4>
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
                        @if($dataKeranjang->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Data belum tersedia</td>
                        </tr>
                        @else
                        @foreach ($dataKeranjang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $item->produk->foto) }}" width="100" height="100" alt=""></td>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->produk->ukuran }}</td>
                            <td>{{ $item->produk->harga }}</td>
                            <td>{{ $item->jumlah_produk }}</td>
                            <td>{{ $item->harga }}</td> <!-- Menampilkan subtotal -->
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-body mt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_pesanan" value="{{ $transaksi->id_transaksi }}"> <!-- Input tak terlihat untuk ID pesanan -->
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
                            <div class="form-group mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3" readonly>{{ $user->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="total_produk">Subtotal Produk</label>
                                <input type="text" class="form-control @error('total_produk') is-invalid @enderror" id="total_produk" name="total_produk" placeholder="Masukkan Total Produk" value="{{ $transaksi->subtotal_produk }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="biaya_pengiriman">Biaya Pengiriman</label>
                                <input type="text" class="form-control @error('biaya_pengiriman') is-invalid @enderror" id="biaya_pengiriman" name="biaya_pengiriman" placeholder="Masukkan Biaya Pengiriman" value="{{ $transaksi->biaya_pengiriman }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="total_bayar">Total Pembayaran</label>
                                <input type="text" class="form-control @error('total_pembayaran') is-invalid @enderror" id="total_bayar" name="total_bayar" placeholder="Total Pembayaran" value="{{ $transaksi->total_bayar }}" readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- <div class="form-group text-center">
                        <button type="submit" class="btn btn-success ml-auto w-50"><i data-feather="edit"></i>Tambah</button>
                    </div> -->
                </form>
                <br>
            </div>
        </div>
    </section>
</div>

@endsection