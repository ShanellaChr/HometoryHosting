<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Hometory - Reset Password</title>
</head>

<body
    style="margin: 0; height: 100vh; background-image: url('/img/BackdropCircle2.svg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container text-align-center justify-content-center align-items-center d-flex vh-100 flex-column">
        <a href="/reset/verify">
            <img src="/img/Back Button.svg" alt="Back Button" class="BackButton">
        </a>
        <img src="/img/LogoBox.svg" alt="Logo Box" class="img-fluid">
        <h3 class="pt-3 montserrat-bold text-center">Reset Password</h3>
        <img src="/img/ResetPassword3.svg" alt="Logo Box" class="img-fluid">
        <form action="{{ route('password.update') }}" method="POST" style="width: 400px;">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3">
                <label for="inputPassword" class="form-label montserrat-medium">New Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control form-control-lg nunito-medium"
                        id="inputPassword" placeholder="Enter your new password" required>
                    <span class="input-group-text" onclick="togglePassword('inputPassword', this)">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label for="inputConfirmPassword" class="form-label montserrat-medium">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation"
                        class="form-control form-control-lg nunito-medium" id="inputConfirmPassword"
                        placeholder="Confirm your new password" required>
                    <span class="input-group-text" onclick="togglePassword('inputConfirmPassword', this)">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="nunito-bold p-3 mt-4 btn-orange rounded shadow w-100">Set New
                Password</button>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
