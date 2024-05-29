<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Ag Home Industri</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title" style="color:#59AB6E">Register.</h1>
                    <p class="auth-subtitle mb-5">Tolong isikan from di bawah ini untuk membuat akun.</p>

                    <form action="{{ url('create') }}" method="POST">
                        @csrf

                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" id="username" name="username" value="{{ old('username') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" id="password" name="password" value="{{ old('password') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        
                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama" id="nama" name="nama" value="{{ old('nama') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        
                        @error('nohp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nomor HP" id="nohp" name="nohp" value="{{ old('nohp') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>
                        
                        @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group position-relative has-icon-left mb-4">
                            <textarea class="form-control form-control-xl" rows="3" placeholder="Alamat" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                            <div class="form-control-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" style="background-color: #59AB6E; border-color:#59AB6E">Register</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Sudah memiliki akun? <a href="{{url('login')}}" class="font-bold" style="color: #59AB6E;">Log in</a>.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
