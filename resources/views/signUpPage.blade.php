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
    <title>Sign Up - Hometory</title>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-6 vh-100 position-relative d-flex flex-column align-items-center">
                <a href="/login">
                    <img src="/img/Back Button.svg" alt="Back Button" class="BackButton">
                </a>

                <div class="position-absolute top-50 start-50 translate-middle" style="width: 400px;">
                    <img src="/img/LogoBox.svg" alt="Logo Box" class="img-fluid d-block mx-auto">
                    <h3 class="pt-3 montserrat-bold text-center">Welcome to Hometory!</h3>
                    <h6 class="mb-5 text-muted montserrat-medium text-center">Register your account</h6>

                    <form action="{{ url('/signup') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputEmail" class="form-label montserrat-medium">Email</label>
                            <input type="text" name="email" class="form-control form-control-lg nunito-medium"
                                id="inputEmail" placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

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

                        <button type="submit" class="btn btn-orange rounded shadow w-100 nunito-bold p-3 mt-3">
                            Sign Up
                        </button>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-6 vh-100 position-relative">
                <img src="/img/BackdropCircle.svg" alt="Backdrop" class="position-absolute w-100 h-100 top-0 end-0 z-1">
                <div class="position-absolute z-2" style="top: 45%; right: 10%;">
                    <img src="/img/Navbar Logo.svg" alt="Logo" class="w-100 mb-2">
                    <h3 class="nunito-medium text-end m-0">Track Smarter, Waste No More!</h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("inputPassword");

        togglePassword.addEventListener("click", function() {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>

</html>
