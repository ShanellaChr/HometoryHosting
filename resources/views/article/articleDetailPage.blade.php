<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hometory - {{$article->title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
</head>
<body>
    <div class="container">
        <div class="pt-3 mb-5">
            <a href="{{ url()->previous() }}">
                <img src="{{ asset('img/Back Button.svg') }}" alt="Back button" class="BackButton">
            </a>
        </div>
        <div class="align-items-center justify-content-center d-flex">
            <img src="{{ asset('storage/'.$article->thumbnail) }}" alt="Image placeholder" class="img-fluid" style="width: 35%; height: auto;">
        </div>
        <div class="align-items-center justify-content-center d-flex montserrat-bold text-xl mb-2">
            {{ $article->title }}
        </div>
        <div class="align-items-center justify-content-center d-flex poppins-regular text-md mb-5">
            {{ $article->updated_at->format('d F Y') }}
        </div>
        <div style="margin-bottom: 15vh;">
            {!! $article->content !!}
        </div>
    </div>
</body>
</html>
