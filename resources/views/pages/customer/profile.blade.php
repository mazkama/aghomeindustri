@extends('layouts.master')
@section('title', 'AG Home Industri')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header" style="background:#ffffff">
            <h3 class="nav-container" style="color:grey; position: relative; display: flex; text-align: center;">
                <button id="biodata-link" class="nav-link active"
                    style="font-size: 24px; cursor: pointer; flex-grow: 1.1; border: none; outline: none; background: none;">Biodata
                    Diri</button>
                <button onclick="password()" id="password-link" class="nav-link"
                    style="font-size: 24px; cursor: pointer; flex-grow: 1; border: none; outline: none; background: none">Ubah
                    Password</button>
                <div id="underline" class="underline" style="padding"></div>
            </h3>
        </div>

        @if(Auth::check())
            <div class="card-body">
                <div class="row">
                    <!-- Data Profil -->
                    <div class="col-md-12" id="biodata-form">
                        <form action="{{ route('customer.update-profile') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3">
                                <strong class="label-item">Ubah Biodata Diri</strong>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama" id="nama" class="form-control" style="box-shadow: #59AB6E"
                                        value="{{ Auth::user()->nama }}">
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="phone" class="col-md-4 col-form-label">Nomor HP</label>
                                <div class="col-md-6">
                                    <input type="text" name="nohp" id="nohp" class="form-control"
                                        value="{{ Auth::user()->nohp }}">
                                    @error('nohp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="dob" class="col-md-4 col-form-label">Alamat</label>
                                <div class="col-md-6">
                                    <textarea name="alamat" id="alamat"
                                        class="form-control">{{  Auth::user()->alamat }}</textarea>
                                    @error('alamat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: #59AB6E; border-color:#59AB6E">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12" id="password-form" style="display:none;">
                        <form action="{{ route('customer.update-profile') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3">
                                <strong class="label-item">Ubah Password</strong>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="old_password" class="col-md-4 col-form-label">Password Sebelumnya</label>
                                <div class="col-md-6">
                                    <input type="password" name="old_password" id="old_password" class="form-control">
                                    @error('old_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="new_password" class="col-md-4 col-form-label">Password Baru</label>
                                <div class="col-md-6">
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="confirm_password" class="col-md-4 col-form-label">Konfirmasi
                                    Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-control">
                                    @error('confirm_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: #59AB6E; border-color:#59AB6E">
                                        <i class="fas fa-save"></i> Ubah Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
<style>
    .nav-link {
        color: grey;
        text-decoration: none;
        position: relative;
    }

    .nav-link.active {
        color: #59AB6E;
    }

    .underline {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50%;
        height: 2px;
        background: #59AB6E;
        transition: left 0.4s ease;
    }
</style>
<script>
    const biodataLink = document.getElementById('biodata-link');
    const passwordLink = document.getElementById('password-link');
    const underline = document.getElementById('underline');
    const biodataForm = document.getElementById('biodata-form');
    const passwordForm = document.getElementById('password-form');

    biodataLink.addEventListener('click', function (event) {
        event.preventDefault();
        biodataForm.style.display = 'block';
        passwordForm.style.display = 'none';
        underline.style.left = '0';
        this.classList.add('active');
        passwordLink.classList.remove('active');
    });

    function password() {
        // Lakukan sesuatu ketika tombol Settings diklik
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = "{{ route('customer.password') }}";
        form.innerHTML = `@csrf`;
        document.body.appendChild(form);
        form.submit();
    }

    passwordLink.addEventListener('click', function (event) {
        event.preventDefault();
        biodataForm.style.display = 'none';
        passwordForm.style.display = 'block';
        underline.style.left = '50%';
        this.classList.add('active');
        biodataLink.classList.remove('active');
    });

    // Menampilkan form ubah password saat halaman pertama kali dimuat
    window.onload = function() {
        biodataForm.style.display = 'block';
        passwordForm.style.display = 'none';
        biodataLink.classList.add('active');
        passwordLink.classList.remove('active');
        underline.style.left = '0';
    };
</script>
<br>
<br>
@endsection