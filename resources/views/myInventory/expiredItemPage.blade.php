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
    <title>Hometory - Expired Item</title>
</head>

<body>
    <div class="container-fluid p-0">
        {{-- Back Button --}}
        <a href="../myInventory">
            <img src="/img/Back Button.svg" alt="Back Button" class="BackButton">
        </a>

        {{-- Content --}}
        <div class="container d-flex flex-column p-5 bg-putih shadow rounded-3 border"
            style="max-height: 80vh; margin-top: 12vh; overflow-y: auto;">
            <h1 class="montserrat-semibold text-3xl">Expired Items</h1>

            <div class="row">
                @forelse ($expiredDates as $exp)
                    <div class="col-12 col-md-6 mb-4">
                        <div onclick="window.location.href='{{ route('item.detail', $exp->item->slug) }}'"
                            class="d-flex flex-row bg-putihpalette rounded-3 mt-3 me-3 pe-4 shadow border align-items-center"
                            style="width: 35vw; min-height: 15vh; cursor: pointer; transition: background-color 0.2s ease-in-out;"
                            onmouseover="this.style.backgroundColor='#f3f3f3';"
                            onmouseout="this.style.backgroundColor='';">

                            <img src="{{ asset($exp->item->subCategory->img) }}" alt="Item Image"
                                class="p-0 m-0 rounded-start-3" style="object-fit: cover; max-width: 10vw">

                            {{-- Keterangan Item --}}
                            <div class="d-flex flex-column ms-4 me-auto" style="max-width: 12vw">
                                <h1 class="nunito-bold text-black text-2xl pb-1 pt-3">
                                    {{ $exp->item->name }}
                                </h1>
                                <p class="poppins-regular text-sm text-muted">
                                    Exp: {{ \Carbon\Carbon::parse($exp->expiration_date)->format('d M Y') }}
                                </p>
                            </div>

                            {{-- Jumlah --}}
                            <p class="poppins-medium text-black text-base pt-4 ms-auto me-2">
                                {{ $exp->qty }} item{{ $exp->qty > 1 ? 's' : '' }}
                            </p>

                            {{-- Tombol Delete --}}
                            <button type="button" class="btn-delete-trigger" data-id="{{ $exp->id }}"
                                data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                onclick="event.stopPropagation();" {{-- supaya klik tombol tidak ikut redirect --}}
                                style="background: none; border: none;">
                                <img src="{{ asset('img/trashbin black.svg') }}" alt="Delete"
                                    class="icon-trash mt-1 ms-auto"
                                    style="width: 3.5vw; height: 3.5vh; cursor: pointer;">
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="d-flex justify-content-center align-items-center flex-column h-100"
                        style="margin-top: 5vh">
                        <img src="{{ asset('img/Calendar for No Items.svg') }}" class="img-fluid w-25"
                            alt="No Item Icon">
                        <h1 class="nunito-semibold w-25 text-center text-3xl mt-3">You Had No Expired Items</h1>
                    </div>
                @endforelse
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

                    <form id="deleteExpiredForm" method="POST">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".btn-delete-trigger");
            const deleteForm = document.getElementById("deleteExpiredForm");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    deleteForm.setAttribute("action", `/myInventory/expiredItemPage/delete/${id}`);
                });
            });
        });
    </script>

</body>

</html>
