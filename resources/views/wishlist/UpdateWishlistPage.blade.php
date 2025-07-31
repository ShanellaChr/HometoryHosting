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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Hometory - Update Wishlist</title>
</head>

<body style="height: 100%;">
    <!-- Header -->
    <div class="bg-birupalette py-3 px-4 d-flex align-items-center" style="height: 5vw;">
        <a href="{{ route('wishlist') }}">
            <img src="{{ asset('img/White Back Button.svg') }}" alt="Back" class="BackButton"
                style="width: 40px; height: 40px;">
        </a>
    </div>

    <div class="text-center mt-5">
        <h1 class="montserrat-bold text-5xl">Update <span class="text-orenyedija">Wishlist</span></h1>
    </div>

    <div class="container mt-4 p-4 ps-5 pe-5 rounded-4 bg-abupalette text-white mb-0"
        style="max-width: 92%; max-height:100%; min-height: 100%;">
        <form id="wishlistForm" action="{{ route('wishlist.update', $wishlist->id) }}" method="POST">
            @csrf

            <!-- Item Name -->
            <div class="mb-4">
                <label for="itemName" class="form-label nunito-bold text-2xl">Item Name</label>
                <input type="text" name="name" class="form-control" id="itemName"
                    value="{{ $wishlist->items_name }}" required>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label class="form-label nunito-bold text-2xl">Item Category</label>
                <div class="row gy-2">
                    @foreach ($categories as $category)
                        <div class="col-6 col-md-4">
                            <button type="button"
                                class="w-100 btn bg-putihpalette montserrat-semibold category-btn text-dark p-2
                                   {{ $wishlist->category_id == $category->id ? 'selected' : '' }}"
                                data-category-id="{{ $category->id }}">
                                {{ $category->category}}
                            </button>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="category_id" id="selectedCategory" value="{{ $wishlist->category_id }}">
                <div id="categoryError" class="text-danger mt-2" style="display: none;">
                    Please select a category before submitting.
                </div>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="itemDesc" class="form-label nunito-bold text-2xl">Item Description (Optional)</label>
                <textarea name="description" class="form-control" id="itemDesc" rows="4">{{ $wishlist->items_description }}</textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-orange px-4 p-2 shadow-lg nunito-bold">Update</button>
        </form>
    </div>

</body>

</html>
