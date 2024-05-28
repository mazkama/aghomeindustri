<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ag Home Industri</title>
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
                    <h1 class="auth-title" style="color:#59AB6E">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form action="loginsukses" method="POST">
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
                        
                        <div class="form-check form-check-lg d-flex align-items-end" >
                            <input class="form-check-input me-2" type="checkbox" value="1" id="keepLoggedIn" name="remember">
                            <label class="form-check-label text-gray-600" for="keepLoggedIn">
                                    Biarkan saya tetap masuk
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" style="background-color: #59AB6E; border-color:#59AB6E">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="{{ url('register') }}" class="font-bold" style="color: #59AB6E;">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html" style="color: #59AB6E;">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

<style>
    .form-check-input:checked {
        background-color: #59AB6E;
        border-color: #59AB6E;
    }
    
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var divElement = document.querySelector('.form-group');
        divElement.addEventListener("click", function() {
            divElement.style.borderColor = '#59AB6E';
        });
    });
</script>
