<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Hometory - Login</title>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-6 vh-100 position-relative d-flex flex-column align-items-center">
                <a href="/">
                    <img src="/img/Back Button.svg" alt="Back Button" class="BackButton">
                </a>

                <div class="position-absolute top-50 start-50 translate-middle" style="width: 400px;">
                    <img src="/img/LogoBox.svg" alt="Logo Box" class="img-fluid d-block mx-auto">
                    <h3 class="pt-3 mb-5 montserrat-bold text-center">Login to Hometory</h3>

                    <form action="{{ url('/login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputUsername" class="form-label montserrat-medium">Username</label>
                            <input type="text" name="username" class="form-control form-control-lg nunito-medium"
                                id="inputUsername" placeholder="Enter your username" value="{{ old('username') }}">
                            @error('username')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputPassword" class="form-label montserrat-medium">Password</label>
                            <div class="input-group">
                                <input type="password" name="password"
                                    class="form-control form-control-lg nunito-medium" id="inputPassword"
                                    placeholder="Enter your password">
                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3 mb-3 text-end">
                            <a href="{{ route('password.request') }}"
                                class="small text-dark montserrat-medium text-decoration-none">Forgot Password?</a>
                        </div>

                        <button type="submit"
                            class="btn btn-orange rounded shadow w-100 nunito-bold p-3">Login</button>

                        <div class="mt-3 mb-5">
                            <p class="d-inline montserrat-medium">Don't have an account?</p>
                            <a href="{{ url('/signup') }}"
                                class="montserrat-bold text-decoration-none text-orenyedija">Sign Up</a>
                        </div>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success mt-3 text-center">{{ session('success') }}</div>
                    @endif

                    @if ($errors->has('username_not_found'))
                        <div class="alert alert-danger mt-3 text-center">{{ $errors->first('username_not_found') }}
                        </div>
                    @endif
                    @if ($errors->has('invalid_password'))
                        <div class="alert alert-danger mt-3 text-center">{{ $errors->first('invalid_password') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-6 vh-100 position-relative">
                <img src="/img/BackdropCircle.svg" alt="BackDrop" class="position-absolute w-100 h-100 top-0 end-0 z-1">
                <div class="position-absolute z-2" style="top: 45%; right: 10%;">
                    <img src="/img/Navbar Logo.svg" alt="Logo" class="w-100 mb-2">
                    <h3 class="nunito-medium text-end m-0">Track Smarter, Waste No More!</h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('inputPassword');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>

</html>
