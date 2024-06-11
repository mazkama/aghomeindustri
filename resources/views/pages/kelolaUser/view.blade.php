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
                    <h3>Data User</h3>
                    <p class="text-subtitle text-muted"><br></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Kelola User</li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <p class="text-right" style="padding-right:10px">
                        <a href="{{ route('kelola.user.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Admin/Gudang
                        </a>
                    </p>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID User</th>
                                <th>Username</th>
                                <th>Nama User</th>
                                <th>Nomor Handphone</th>
                                <th>Alamat</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 1;
                            ?>
                            @foreach ($dataUser as $data)
                                <tr>
                                    <td style="font-weight: bold">{{ $number++ }}</td>
                                    <td>{{ $data->id_user }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nohp }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td style="font-weight: bold">{{ $data->role }}</td>
                                    <td>
                                        <form action="{{ route('kelola.user.delete', $data->id_user) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
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