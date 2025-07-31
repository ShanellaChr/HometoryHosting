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
    <title>Hometory - {{ $item->name }}</title>
</head>

<body>
    <div class="container-fluid p-0">
        {{-- Back Button --}}
        <a href="../myInventory">
            <img src="/img/Back Button.svg" alt="Back Button" class="BackButton">
        </a>

        {{-- Content --}}
        <div class="d-flex justify-content-center align-items-center flex-column my-5">
            <img src="{{ asset($item->subCategory->img) }}"
                alt="{{ $item->category->category . ' - ' . $item->subCategory->subcategory }}" style="width: 18vw">

            <h1 class="montserrat-semibold text-3xl mt-3">{{ $item->name }}</h1>

            <div class="d-flex flex-row mt-1">
                <div class="mx-2 py-2 px-3 rounded-2 bg-{{ $item->category->color }} shadow">
                    <p class="montserrat-semibold text-center text-lg m-0">{{ $item->category->category }}</p>
                </div>

                <div class="mx-2 py-2 px-3 rounded-2 bg-orenpalette shadow">
                    <p class="montserrat-semibold text-center text-lg m-0">{{ $item->subCategory->subcategory }}</p>
                </div>
            </div>

            <div class="container">
                {{-- Item Details --}}
                <h1 class="mt-5 montserrat-semibold text-2xl">Item Details</h1>
                <hr class="border-2 border-black rounded w-full my-2" style="opacity: 1;">

                <div class="d-flex flex-row mt-3">
                    <div class="bg-abupalette rounded-3 me-3 px-4 py-3 text-center shadow" style="width: fit-content">
                        <h1 class="nunito-bold text-putihpalette text-xl">Total Quantity</h1>
                        <span class="text-xl text-white poppins-bold"><img src="{{ asset('img/quantityIcon.svg') }}"
                                class="me-2 pb-1" alt="Quantity Icon">{{ $item->expirationDates->sum('qty') }}</span>
                    </div>

                    <div class="bg-abupalette rounded-3 mx-3 px-4 py-3 text-center shadow" style="width: fit-content">
                        <h1 class="nunito-bold text-putihpalette text-xl">Location Stored</h1>
                        <span class="text-lg text-white poppins-bold"><img src="{{ asset('img/locationIcon.svg') }}"
                                class="me-2 pb-1" alt="Location Icon">{{ $item->location }}</span>
                    </div>
                </div>

                {{-- My Notes --}}
                <h1 class="mt-5 montserrat-semibold text-2xl">My Notes</h1>
                <hr class="border-2 border-black rounded w-full my-2" style="opacity: 1;">
                <p class="nunito-medium text-xl">
                    {{ $item->note }}
                </p>

                {{-- Expiration Dates --}}
                <h1 class="mt-5 montserrat-semibold text-2xl">Expiration Dates</h1>
                <hr class="border-2 border-black rounded w-full my-2" style="opacity: 1;">

                @foreach ($item->expirationDates->sortBy('expiration_date') as $exp)
                    <div class="d-flex flex-row {{ \Carbon\Carbon::parse($exp->expiration_date)->isPast() ? 'bg-ijopalette' : 'bg-putihpalette' }} rounded-3 mt-3 me-3 px-4 py-2 shadow"
                        style="width: 30vw">
                        <img src="{{ asset(\Carbon\Carbon::parse($exp->expiration_date)->isPast() ? 'img/expiredButton.svg' : 'img/CalendarGreen.svg') }}"
                            alt="Expiration Icon" class="mb-1" style="width: 2.5vw">
                        <h1
                            class="poppins-bold {{ \Carbon\Carbon::parse($exp->expiration_date)->isPast() ? 'text-putihpalette' : 'text-ijopalette' }} text-2xl mx-5 mt-1 pt-2">
                            {{ \Carbon\Carbon::parse($exp->expiration_date)->format('d/m/Y') }}
                        </h1>
                        <p
                            class="poppins-medium {{ \Carbon\Carbon::parse($exp->expiration_date)->isPast() ? 'text-putihpalette' : 'text-ijopalette' }} text-base pt-3 ms-auto">
                            {{ $exp->qty }} item{{ $exp->qty > 1 ? 's' : '' }}
                        </p>
                    </div>
                @endforeach
            </div>

            {{-- Buttons --}}
            <div class="d-flex flex-row align-items-center ms-auto me-5">
                <div class="mx-4 mb-4 mt-5" style="width: fit-content">
                    <a href = "{{ route('item.edit', $item->slug) }}" class="btn-dark-blue rounded-3 shadow"
                        style="padding-left: 3.25vw; padding-right: 2vw; padding-top: 1.5vw; padding-bottom: 1.5vw">
                        <span class= "nunito-bold text-2xl text-center">Edit Item</span>
                        <img src="{{ asset('img/editButton.svg') }}" alt="Edit Icon"
                            class="pencil-icon mb-1 ms-0 pe-3">
                    </a>
                </div>

                <div class="me-5 mb-4 mt-5" style="width: fit-content">
                    <button type="button" class="btn-merah rounded-3 shadow"
                        style="padding-left: 3.25vw; padding-right: 2vw; padding-top: 1vw; padding-bottom: 1vw"
                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                        <span class= "nunito-bold text-2xl text-center">Delete Item</span>
                        <img src="{{ asset('img/trashbin white icon.svg') }}" alt="Trash Bin Icon"
                            class="pencil-icon mb-1 ms-0 pe-3">
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL UNTUK DELETE --}}
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1rem;">

                <!-- Header -->
                <div class="modal-header bg-merahbutton text-putihpalette d-flex flex-column align-items-center"
                    style="border-bottom: none;">
                    <img src="/img/warning icon.svg" alt="Warning" width="80" height="80" class="mb-2">
                </div>

                <!-- Footer -->
                <div class="modal-footer d-flex justify-content-center gap-3 pt-2 mb-3">
                    <h3 class="modal-title w-100 text-center montserrat-bold" id="deleteConfirmationLabel">
                        Are You Sure Want <br> To Delete?
                    </h3>
                    <button type="button" class="btn btn-abu d-flex align-items-center gap-2 px-4"
                        data-bs-dismiss="modal">
                        Cancel
                        <img src="/img/cancel icon.svg" alt="Cancel" width="20" height="20">
                    </button>

                    <form action="{{ route('item.delete', $item->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-merah d-flex align-items-center gap-2 px-4">
                            Delete
                            <img src="/img/trashbin white icon.svg" alt="Delete" width="20" height="20">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
