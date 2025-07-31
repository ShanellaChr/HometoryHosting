@section('title', 'Hometory - My Profile')
<x-master>
    <div class="position-relative w-100 d-flex flex-column align-items-center"
        style="height: 100vh; background: url('/img/BackdropProfilePage.svg') no-repeat top center; background-size: cover; padding-top: 15vh;">
        <h1 class="montserrat-bold text-5xl text-center mb-5">
            My<span class="ms-3 text-orenyedija">Profile</span>
        </h1>

        <div class="container mt-5 pt-5" style="max-width: 480px;">
            <div class="mb-4">
                <label class="form-label montserrat-medium">Username</label>
                <input type="text" class="form-control form-control-lg nunito-medium" value="{{ $user->username }}"
                    readonly>
            </div>
            <div class="mb-4">
                <label class="form-label montserrat-medium">Email</label>
                <input type="email" class="form-control form-control-lg nunito-medium" value="{{ $user->email }}"
                    readonly>
            </div>
            <div class="mb-4">
                <label class="form-label montserrat-medium">Password</label>
                <input type="password" class="form-control form-control-lg nunito-medium" value="********" readonly>
            </div>

            <div class="row justify-content-center mt-5 pt-3 text-center">
                <div class="col-12 col-md-4 mb-2">
                    <a href="{{ route('profile.edit') }}"
                        class="btn btn-ijo btn-ijo:hover w-100 d-flex justify-content-center align-items-center gap-2 py-2 nunito-bold">
                        Edit
                        <img src="/img/editButton.svg" alt="Edit" width="20" height="20">
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="button"
                            class="btn btn-orange-putih btn-orange-putih:hover w-100 d-flex justify-content-center align-items-center gap-2 py-2 nunito-bold"
                            data-bs-toggle="modal" data-bs-target="#logoutConfirmationModal">
                            Logout
                            <img src="/img/logOutIcon.svg" alt="Logout" width="20" height="20">
                        </button>

                    </form>
                </div>

                <div class="col-12 col-md-4 mb-2">
                    <button type="button"
                        class="btn btn-merah btn-merah:hover w-100 d-flex justify-content-center align-items-center gap-2 py-2 nunito-bold"
                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                        Delete
                        <img src="/img/trashbin white icon.svg" alt="Delete" width="20" height="20">
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel"
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
                    <form action="{{ route('profile.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-merah btn-merah:hover d-flex align-items-center gap-2 px-4">
                            Delete
                            <img src="/img/trashbin white icon.svg" alt="Delete" width="20" height="20">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutConfirmationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1rem;">
                <div class="modal-header bg-orenpalette text-white d-flex flex-column align-items-center"
                    style="border-bottom: none; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    <img src="/img/warning icon.svg" alt="Warning" width="80" height="80" class="mb-2">
                </div>
                <div class="modal-footer d-flex justify-content-center gap-3 pt-2 mb-3">
                    <h3 class="modal-title w-100 text-center montserrat-bold" id="logoutConfirmationLabel">
                        Are You Sure You Want To Logout?
                    </h3>
                    <button type="button" class="btn btn-abu btn-abu:hover d-flex align-items-center gap-2 px-4"
                        data-bs-dismiss="modal">
                        Cancel
                        <img src="/img/cancel icon.svg" alt="Cancel" width="20" height="20">
                    </button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="btn btn-orange-putih btn-orange-putih:hover d-flex align-items-center gap-2 px-4">
                            Logout
                            <img src="/img/logOutIcon.svg" alt="Logout" width="20" height="20">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-master>
