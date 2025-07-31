<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hometory - Admin Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class=" d-flex justify-content-between align-content-between my-4 mx-5">
        <p class=" text-4xl montserrat-bold mb-0">Helo, <span class="text-orenyedija">Good Afternoon!</span></p>

        <div class="align-items-center d-flex">
            <a href="/" class="d-flex gap-2 btn btn-orange-putih btn-orange-putih:hover rounded-3 nunito-bold"
                style="padding-inline:1.5vw; padding-block:1vh; text-decoration: none; display: inline-block;"
                data-bs-toggle="modal" data-bs-target="#LogoutConfirmationModal">
                Log Out
                <img src="{{ asset('img/logOutIcon.svg') }}" style="width: 22px" alt="">
            </a>

        </div>

    </div>

    <div class="border-2 mx-5 mb-3"></div>

    <div class="row overflow-auto" style="margin-inline:2.5vw; max-height:60vh">

        @foreach ($articles as $article)
            <div class="col-6 my-3">
                <div class="p-3 bg-white d-flex justify-content-between align-items-start shadow rounded-4">

                    <a href="{{ route('article.detail', $article->slug) }}" class="flex-grow-1" style="text-decoration: none; color: inherit; margin-right: 1rem;">
                        <div>
                            <p class="mb-0 nunito-bold">{{ $article->title }}</p>
                            <p class="mb-0 nunito-regular fs-6">{{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </a>

                   <button type="button" class="my-0" style="background:none; border:none"
                        data-bs-toggle="modal"
                        data-bs-target="#adminArticleDeleteModal"
                        data-delete-url="{{ route('article.destroy', $article->id) }}">
                        <img src="{{ asset('img/trashbin black.svg') }}" style="width: 3.5vw; height: 3.5vh; cursor: pointer;">
                    </button>


                </div>
            </div>
        @endforeach

    </div>

    <div class="border-2 mx-5 mt-3"></div>

    <div class="d-flex justify-content-center p-5">
        <a href="/addarticle" class="btn btn-orange rounded-3 nunito-bold"
            style="padding-inline:1.5vw; padding-block:1vh; text-decoration:none; display:inline-block;">Add Article
            <span style="font-size: 1.4vw; font-weight:800">+</span></a>
    </div>
    </div>


    {{-- Popup --}}
    <div class="modal fade" id="LogoutConfirmationModal" tabindex="-1" aria-labelledby="LogoutConfirmationModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1rem;">
                <div class="modal-header bg-orenpalette text-putihpalette d-flex flex-column align-items-center"
                    style="border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    <img src="/img/warning icon.svg" alt="Warning" width="80" height="80" class="mb-2">
                </div>
                <div class="modal-footer d-flex justify-content-center gap-3 pt-2 mb-3">
                    <h3 class="modal-title w-100 text-center montserrat-bold" id="LogoutConfirmationLabel">Are You Sure
                        Want <br> To Log Out?
                    </h3>

                    <button type="button" class="btn btn-abu btn-abu:hover d-flex align-items-center gap-2 px-4"
                        data-bs-dismiss="modal">
                        Cancel
                        <img src="/img/cancel icon.svg" alt="Cancel" width="20" height="20">
                    </button>
                    <a href="{{ route('loginShow') }}" style="text-decoration: none">
                        <button type="" class="btn btn-orange-putih btn-orange-putih:hover d-flex align-items-center gap-2 px-4">
                            Log Out
                            <img src="{{ asset('img/logOutIcon.svg') }}" width="20" height="20">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="adminArticleDeleteModal" tabindex="-1" aria-labelledby="adminArticleDeleteModal "
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1rem;">
                <div class="modal-header bg-merahbutton text-putihpalette d-flex flex-column align-items-center"
                    style="border-bottom: none;border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    <img src="/img/warning icon.svg" alt="Warning" width="80" height="80" class="mb-2">
                </div>
                <div class="modal-footer d-flex justify-content-center gap-3 pt-2 mb-3">
                    <h3 class="modal-title w-100 text-center montserrat-bold" id="deleteConfirmationLabel">Are You Sure
                        Want <br> To Delete?</h3>
                    <button type="button" class="btn btn-abu btn-abu:hover d-flex align-items-center gap-2 px-4"
                        data-bs-dismiss="modal">
                        Cancel
                        <img src="/img/cancel icon.svg" alt="Cancel" width="20" height="20">
                    </button>

                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-merah btn-merah:hover d-flex align-items-center gap-2 px-4">
                            Delete
                            <img src="/img/trashbin white icon.svg" alt="Delete" width="20" height="20">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const adminArticleDeleteModal = document.getElementById('adminArticleDeleteModal');

        adminArticleDeleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const deleteUrl = button.getAttribute('data-delete-url');
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('action', deleteUrl);
        });
    </script>

</body>

</html>
