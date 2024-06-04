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
                    <h3>ID Transaksi #{{$transaksi->id_transaksi}}</h3>
                    <p class="text-subtitle text-muted">Edit Data Transaksi</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/kelola-transaksi') }}">Kelola Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Produk</h4>
                </div>
                <div class="card-body">
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
                </div>
            </div>
        </section>

        @if($pembayaran)
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informasi Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_produk">Nama Rekening</label>
                                <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" id="nama_rekening" name="nama_rekening" placeholder="Masukkan Nama Pemesan" value="{{ $pembayaran->nama_rekening }}" readonly>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="stok">Rekening</label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="rekening" name="rekening" placeholder="Masukkan Nomor Hp Produk" value="{{ $pembayaran->rekening }}" readonly>
                                @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="stok">Tanggal Pembayaran</label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="rekening" name="rekening" placeholder="Masukkan Nomor Hp Produk" value="{{ $pembayaran->tanggal_pembayaran }}" readonly>
                                @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <form action="{{ route('kelolaTransaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST">
                                @csrf 
                                @if ($transaksi->status_bayar == "Menunggu Konfirmasi Pembayaran")
                                <div class="form-group pt-3">
                                    <button type="submit" name="action" value="konfirmasi" class="btn btn-primary ml-auto">Konfirmasi</button>
                                    <button type="submit" name="action" value="hapus" class="btn btn-danger ml-auto">Hapus</button>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

        </section>
        @endif

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Transaksi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelolaTransaksi.update', $transaksi->id_transaksi)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_produk">Nama Pemesan</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama Pemesan" value="{{ $transaksi->user->nama }}" readonly>
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="stok">Nomor Hp</label>
                                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="stok" name="nohp" placeholder="Masukkan Nomor Hp Produk" value="{{ $transaksi->user->nohp }}" readonly>
                                    @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" readonly>{{ $transaksi->user->alamat }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <fieldset class="form-group">
                                    <label for="status_bayar">Status Transaksi</label>
                                    <select class="form-select @error('status_bayar') is-invalid @enderror" id="status_bayar" name="status_bayar">
                                        <option value="" disabled selected>-- Pilih Status --</option>
                                        <option value="Menunggu Konfirmasi" {{ $transaksi->status_bayar == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                        <option value="Menunggu Pembayaran" {{ $transaksi->status_bayar == 'Menunggu Pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                        <option value="Menunggu Konfirmasi Pembayaran" {{ $transaksi->status_bayar == 'Menunggu Konfirmasi Pembayaran' ? 'selected' : '' }}>Menunggu Konfirmasi Pembayaran</option>
                                        <option value="Pembayaran Gagal" {{ $transaksi->status_bayar == 'Pembayaran Gagal' ? 'selected' : '' }}>Pembayaran Gagal</option>
                                        <option value="Diproses" {{ $transaksi->status_bayar == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Dikirim" {{ $transaksi->status_bayar == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="Selesai" {{ $transaksi->status_bayar == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Dibatalkan" {{ $transaksi->status_bayar == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                    @error('status_bayar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>

                                <div class="form-group mb-3">
                                    <label for="subtotal_produk">Subtotal Produk</label>
                                    <input type="text" class="form-control @error('subtotal_produk') is-invalid @enderror" id="subtotal_produk" name="subtotal_produk" placeholder="Masukkan subtotal Produk" value="{{ $transaksi->subtotal_produk }}" readonly>
                                    @error('subtotal_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="biaya_pengiriman">Biaya Pengiriman</label>
                                    <input type="text" class="form-control @error('biaya_pengiriman') is-invalid @enderror" id="biaya_pengiriman" name="biaya_pengiriman" placeholder="Masukkan Biaya Pengiriman" value="{{ $transaksi->biaya_pengiriman }}">
                                    @error('biaya_pengiriman')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="total_bayar">Total Bayar</label>
                                    <input type="text" class="form-control @error('total_bayar') is-invalid @enderror" id="total_bayar" name="total_bayar" placeholder="Masukkan Total Bayar" value="{{ $transaksi->total_bayar }}" readonly>
                                    @error('total_bayar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ml-auto"><i data-feather="edit"></i>Simpan</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    // Ambil elemen input biaya_pengiriman dan total_bayar
    var biayaPengirimanInput = document.getElementById('biaya_pengiriman');
    var totalBayarInput = document.getElementById('total_bayar');

    // Tambahkan event listener untuk input biaya_pengiriman
    biayaPengirimanInput.addEventListener('input', function() {
        // Ambil nilai biaya_pengiriman
        var biayaPengiriman = parseFloat(biayaPengirimanInput.value);

        // Pastikan biaya_pengiriman adalah angka
        if (!isNaN(biayaPengiriman)) {
            // Hitung total bayar
            var subtotalProduk = parseInt("{{ $transaksi->subtotal_produk }}");
            var totalBayar = subtotalProduk + biayaPengiriman;

            totalBayarInput.value = totalBayar; // Menampilkan total bayar dengan 2 digit desimal
        } else {
            // Jika biaya_pengiriman bukan angka, set total bayar menjadi kosong
            totalBayarInput.value = '';
        }
    });
</script>

@endsection