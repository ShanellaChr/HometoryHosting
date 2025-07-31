@section('title', 'Hometory - My Wishlist')
<x-master>
    {{-- Judul --}}
    <div class="d-flex justify-content-center align-items-center pt-7 montserrat-bold text-5xl">
        My <span class="ms-3 text-orenyedija">Wishlist</span>
    </div>

    <div class="d-flex justify-content-center align-items-center mt-1 mb-5 nunito-regular text-lg">
        Plan wisely, shop mindfully!
    </div>

    {{-- Box --}}
    <div class="container mt-0 mb-5 card bg-dark-blue text-white shadow-lg p-3 rounded-4 position-relative bg-abupalette">

        {{-- Isi Wishlist --}}
        @if($wishlists->count())
            @foreach ($wishlists as $wishlist)
                <div class="position-relative bg-putihpalette text-black py-3 ps-4 pe-3 mb-3 rounded-4 d-flex align-items-center" style="overflow: hidden;">
                    
                    {{-- Strip warna dari kategori --}}
                    <div class="position-absolute top-0 bottom-0 start-0 rounded-start bg-{{ $wishlist->category->color ?? 'pinkcategory' }}" style="width: 1.2vw;"></div>

                    {{-- Checkbox --}}
                    <button type="button"
                        class="custom-checkbox-wrapper ms-1 me-3 btn p-0 bg-transparent border-0"
                        data-bs-toggle="modal"
                        data-bs-target="#doneConfirmationModal"
                        data-wishlist-id="{{ $wishlist->id }}"
                        aria-label="Selesai">
                        <input type="checkbox" class="custom-checkbox" tabindex="-1" style="pointer-events: none;" />
                        <span class="checkmark"></span>
                    </button>

                    {{-- Konten --}}
                    <div class="flex-grow-1">
                        <p class="mb-0 montserrat-bold">{{ $wishlist->items_name }}</p>
                        <p class="mb-0 nunito-medium">{{ $wishlist->items_description }}</p>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="position-absolute top-0 end-0 me-3 mt-2 d-flex gap-2">
                        <a href="{{ route('wishlist.edit', $wishlist->id) }}" class="btn bg-transparent p-0">
                            <img src="{{ asset('img/pencil black.svg') }}" alt="Edit" width="26" height="26">
                        </a>
                        <button type="button"
                            class="btn bg-transparent p-0"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmationModal"
                            data-wishlist-id="{{ $wishlist->id }}">
                            <img src="{{ asset('img/trashbin black.svg') }}" alt="Delete" width="26" height="26">
                        </button>
                    </div>
                </div>
            @endforeach

        @else
            <div class="text-center mt-5">
                <img src="{{ asset('img/Wishlist.svg') }}" class="img-fluid" style="width: 17vw;">
                <p class="mt-3 fs-4 nunito-semibold">Your Wishlist Is Empty</p>
            </div>
        @endif


        {{-- Label Kategori --}}
        <div class="container position-relative mt-4">
            <div class="row mb-1">
                <div class="col-4 d-flex align-items-center gap-2">
                    <div class="color-box-wishlist rounded-1 bg-pinkcategory"></div>
                    <p class="poppins-semibold mb-0">Personal Care</p>
                </div>
                <div class="col-4 d-flex align-items-center gap-2">
                    <div class="color-box-wishlist rounded-1 bg-merahtuacategory"></div>
                    <p class="poppins-semibold mb-0">Foods</p>
                </div>
                <div class="col-4 d-flex align-items-center gap-2">
                    <div class="color-box-wishlist rounded-1 bg-birucategory"></div>
                    <p class="poppins-semibold mb-0">Beverages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex align-items-center gap-2">
                    <div class="color-box-wishlist rounded-1 bg-coklatcategory"></div>
                    <p class="poppins-semibold mb-0">Kitchen Needs</p>
                </div>
                <div class="col-4 d-flex align-items-center gap-2">
                    <div class="color-box-wishlist rounded-1 bg-ijocategory"></div>
                    <p class="poppins-semibold mb-0">Household Essentials</p>
                </div>
                <div class="col-4 d-flex align-items-center gap-2">
                    <div class="color-box-wishlist rounded-1 bg-merahcategory"></div>
                    <p class="poppins-semibold mb-0">Health Supplies</p>
                </div>
            </div>

            {{-- Tombol Tambah --}}
            <div class="position-absolute bottom-0 end-0">
                <a href="{{ route('wishlist.add') }}" class="btn-orange rounded-3 px-4 pe-4 shadow-lg gap-2" style="padding-bottom: 0.8vw; padding-top: 0.8vw; display: flex; align-items: center;">
                    <span class="nunito-bold">Add Wishlist</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
<!-- Modal Delete Konfirmasi -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 1rem;">

      <!-- Header -->
      <div class="modal-header bg-merahbutton text-putihpalette d-flex flex-column align-items-center" style="border-bottom: none;">
        <img src="/img/warning icon.svg" alt="Warning" width="80" height="80" class="mb-2">
      </div>

      <!-- Body & Footer -->
      <div class="modal-footer d-flex flex-column justify-content-center gap-3 pt-2 mb-3">
        <h3 class="modal-title w-100 text-center montserrat-bold" id="deleteConfirmationLabel">
          Are You Sure Want <br> To Delete?
        </h3>
        <div class="d-flex justify-content-center gap-3">
          <button type="button" class="btn btn-abu d-flex align-items-center gap-2 px-4" data-bs-dismiss="modal">
            Cancel
            <img src="/img/cancel icon.svg" alt="Cancel" width="20" height="20">
          </button>

          <form id="deleteForm" method="POST">
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
</div>
<!-- Modal Selesai Konfirmasi -->
<div class="modal fade" id="doneConfirmationModal" tabindex="-1" aria-labelledby="doneConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 1rem;">

      <!-- Header -->
      <div class="modal-header bg-ijopalette text-putihpalette d-flex flex-column align-items-center" style="border-bottom: none;">
        <img src="/img/warning icon.svg" alt="Warning" width="80" height="80" class="mb-2">
      </div>

      <!-- Body & Footer -->
      <div class="modal-footer d-flex flex-column justify-content-center gap-3 pt-2 mb-3">
        <h3 class="modal-title w-100 text-center montserrat-bold" id="doneConfirmationLabel">
          Are You Sure This Wishlist <br> Is Completed?
        </h3>
        <div class="d-flex justify-content-center gap-3">
          <button type="button" class="btn btn-abu d-flex align-items-center gap-2 px-4" data-bs-dismiss="modal">
            Cancel
            <img src="/img/cancel icon.svg" alt="Cancel" width="20" height="20">
          </button>

          <form id="doneForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-ijo d-flex align-items-center gap-2 px-4">
              Yes, Mark as Completed
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Modal konfirmasi selesai (done)
        var doneModal = document.getElementById('doneConfirmationModal');
        var doneForm = document.getElementById('doneForm');
        var lastCheckedButton = null;
        var lastCheckedInput = null;

        // When modal is shown
        doneModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var wishlistId = button.getAttribute('data-wishlist-id');
            doneForm.action = `/wishlist/check/${wishlistId}`;

            // Find the checkbox input inside the clicked button and check it
            lastCheckedButton = button;
            lastCheckedInput = button.querySelector('input[type="checkbox"]');
            if (lastCheckedInput) {
                lastCheckedInput.checked = true;
            }
        });

        // When modal is hidden (cancel or close)
        doneModal.addEventListener('hidden.bs.modal', function () {
            if (lastCheckedInput) {
                lastCheckedInput.checked = false;
            }
            lastCheckedButton = null;
            lastCheckedInput = null;
        });
    });
</script>
</x-master>
