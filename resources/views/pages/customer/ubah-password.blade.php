@extends('layouts.master')
@section('title', 'AG Home Industri')

@section('content')

<div class="container mt-5">
    @if(session('editpasswordSuccess'))
        <div class="alert alert-success">
            {{ session('editpasswordSuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header" style="background:#ffffff">
            <h3 class="nav-container" style="color:grey; position: relative; display: flex; text-align: center;">
                <button onclick="biodata()" id="biodata-link" class="nav-link"
                    style="font-size: 24px; cursor: pointer; flex-grow: 1.1; border: none; outline: none; background: none;">Biodata
                    Diri</button>
                <button id="password-link" class="nav-link active"
                    style="font-size: 24px; cursor: pointer; flex-grow: 1; border: none; outline: none; background: none;">Ubah
                    Password</button>
                <div id="underline" class="underline" style="left: 50%;"></div>
            </h3>
        </div>

        @if(Auth::check())
            <div class="card-body">
                <div class="row">
                    <!-- Form Ubah Password -->
                    <div class="col-md-12" id="password-form">
                        <form action="{{ route('customer.update-password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3">
                                <strong class="label-item">Ubah Password</strong>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="old_password" class="col-md-4 col-form-label">Password Sebelumnya</label>
                                <div class="col-md-6">
                                    <input type="password" name="old_password" id="old_password" class="form-control"
                                        placeholder="Masukkan Password Lama Anda">
                                    @error('old_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="new_password" class="col-md-4 col-form-label">Password Baru</label>
                                <div class="col-md-6">
                                    <input type="password" name="new_password" id="new_password" class="form-control"
                                        placeholder="Masukkan Password Baru">
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
                                        class="form-control" placeholder="Konfirmasi Password Baru">
                                    @error('confirm_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #59AB6E; border-color:#59AB6E">
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
        right: 0;
        width: 50%;
        height: 2px;
        background: #59AB6E;
        transition: right 0.4s ease;
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
        underline.style.left = '50%';
        this.classList.add('active');
        passwordLink.classList.remove('active');
    });

    function biodata() {
        // Lakukan sesuatu ketika tombol Settings diklik
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = "{{ route('customer.profile') }}";
        form.innerHTML = `@csrf`;
        document.body.appendChild(form);
        form.submit();
    }

    passwordLink.addEventListener('click', function (event) {
        event.preventDefault();
        biodataForm.style.display = 'none';
        passwordForm.style.display = 'block';
        underline.style.left = '0';
        this.classList.add('active');
        biodataLink.classList.remove('active');
    });

    // Menampilkan form ubah password saat halaman pertama kali dimuat
    window.onload = function () {
        passwordForm.style.display = 'block';
        biodataForm.style.display = 'none';
        passwordLink.classList.add('active');
        biodataLink.classList.remove('active');
        underline.style.left = '0';
    };

</script>
<br>
<br>
@endsection