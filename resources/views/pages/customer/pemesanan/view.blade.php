@extends('layouts.master')
@section('title', 'AG Home Industri')
@section('content')

<div class="container my-4">
    <h4 class="mb-3"><b>Pesanan Saya</b></h4>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tanggal Pemesanan</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            @endphp
            @if($dataTransaksi->isEmpty())
            <tr>
                <td colspan="6" class="text-center">Data belum tersedia</td>
            </tr>
            @else
            @foreach ($dataTransaksi as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id_transaksi }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->total_bayar }}</td>
                <td>{{ $data->status_bayar }}</td>
                <td>
                    <a href="{{ route('transaksi.detail', $data->id_transaksi) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection