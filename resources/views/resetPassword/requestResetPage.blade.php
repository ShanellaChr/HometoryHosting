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
        <a href="../login">
            <img src="/img/Back Button.svg" alt="Back Button" class="BackButton">
        </a>
        <img src="/img/LogoBox.svg" alt="Logo Box" class="img-fluid">
        <h3 class="pt-3 montserrat-bold text-center">Reset Password</h3>
        <img src="/img/resetPassword1.svg" alt="Logo Box" class="img-fluid">
        <form action="{{ route('password.sendCode') }}" method="POST" style="width: 400px;">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="form-label montserrat-medium">Email</label>
                <input type="email" name="email" id="inputEmail" class="nunito-medium form-control form-control-lg"
                    placeholder="Enter your email" required>
            </div>
            <button type="submit" class="nunito-bold p-3 mt-5 btn-orange rounded shadow w-100">
                Send Reset Code
            </button>
            @if ($errors->any())
                <div class="alert alert-danger mt-2">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</body>

</html>
