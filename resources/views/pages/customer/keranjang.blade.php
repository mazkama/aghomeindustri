@extends('layouts.master')
@section('title', 'AG Home Industri')
@section('content')

<div class="container my-4">
    <h2><b>Keranjang Pemesanan</b></h2>
    <table class="table table-bordered table-hover ">
        <thead>
            <tr class="table-success">
                <th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Ukuran</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
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
            $subtotal = $item->harga;
            $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/' . $item->produk->foto) }}" width="100" height="100" alt=""></td>
                <td>{{ $item->produk->nama_produk }}</td>
                <td>{{ $item->produk->ukuran }}</td>
                <td>{{ $item->produk->harga }}</td>
                <td>
                    <form action="{{ route('keranjang.update', $item->id_dt_tr) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-auto">
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item">
                                    <button type="submit" class="btn btn-success btn-minus" name="action" value="minus">-</button>
                                </li>
                                <li class="list-inline-item">
                                    <span class="badge bg-secondary var-value">{{ $item->jumlah_produk }}</span>
                                </li>
                                <li class="list-inline-item">
                                    <button type="submit" class="btn btn-success btn-plus" name="action" value="plus">+</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </td>
                <td>{{ $item->harga }}</td>
                <td>
                    <form action="{{ route('keranjang.delete', $item->id_dt_tr) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr style="text-align: center;">
                <td colspan="4"><b>Total Harga</b></td>
                <td colspan="4"><b>Rp. {{ $total }}</b></td>
            </tr>
            @endif
        </tbody>
    </table> 
    @if(!$dataKeranjang->isEmpty())
    <div style="display: flex; justify-content: flex-end;">
        <a href="{{ route('transaksi.create') }}" class="btn btn-success my-3">Lanjut ke Transaksi</a>
    </div>
    @endif
</div>
@endsection