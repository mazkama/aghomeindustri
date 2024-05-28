@extends('layouts.master')
@section('title', 'AG Home Industri')
@section('content')

<div class="container my-4">
    <h4><b>Detail Transaksi</b></h4>
    <section class="section mt-3 ">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="p-3 text-center text-white">STATUS {{ $transaksi ->status_bayar }}</h4>
                <div class="form-group text-center m-3">
                    <button type="submit" class="btn btn-outline-primary ml-auto w-50 d-inline-block mb-2"><i data-feather="edit"></i>Bayar Pemesanan</button>
                    <button type="submit" class="btn btn-outline-danger ml-auto w-50 d-inline-block"><i data-feather="edit"></i>Batalkan Pemesanan</button>
                </div>
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
                        $subtotal = $item->harga * $item->jumlah_produk; // Menghitung subtotal dengan memperhitungkan jumlah produk
                        $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $item->produk->foto) }}" width="100" height="100" alt=""></td>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->produk->ukuran }}</td>
                            <td>{{ $item->produk->harga }}</td>
                            <td>{{ $item->jumlah_produk }}</td>
                            <td>{{ $subtotal }}</td> <!-- Menampilkan subtotal -->
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-body mt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @php
                    $biayaPengiriman = 25000;
                    $totalPembayaran = $total + $biayaPengiriman;
                    @endphp
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
                                <label for="total_produk">Total Produk</label>
                                <input type="text" class="form-control @error('total_produk') is-invalid @enderror" id="total_produk" name="total_produk" placeholder="Masukkan Total Produk" value="{{ $total }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="biaya_pengiriman">Biaya Pengiriman</label>
                                <input type="text" class="form-control @error('biaya_pengiriman') is-invalid @enderror" id="biaya_pengiriman" name="biaya_pengiriman" placeholder="Masukkan Biaya Pengiriman" value="25000" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="total_pembayaran">Total Pembayaran</label>
                                <input type="text" class="form-control @error('total_pembayaran') is-invalid @enderror" id="total_pembayaran" name="total_pembayaran" placeholder="Total Pembayaran" value="{{ $totalPembayaran }}" readonly>
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