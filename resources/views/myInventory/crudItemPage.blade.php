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
    <title>Hometory - {{ $mode === 'edit' ? 'Edit' : 'Add' }} Item</title>
</head>

<body style="height: 100%; margin-bottom: 5vh">
    <!-- Header -->
    <div class="bg-birupalette py-3 px-4 d-flex align-items-center" style="height: 5vw;">
        <a href="{{ $mode === 'edit' ? route('item.detail', ['slug' => $item->slug]) : route('item.index') }}">
            <img src="{{ asset('img/White Back Button.svg') }}" alt="Back" class="BackButton"
                style="width: 40px; height: 40px;">
        </a>
    </div>

    <div class="text-center mt-5">
        <h1 class="montserrat-bold text-5xl">{{ $mode === 'edit' ? 'Edit' : 'Add' }} <span
                class="text-orenyedija">Item</span></h1>
    </div>

    <div class="container mt-4 p-4 ps-5 pe-5 rounded-4 bg-abupalette text-white mb-0"
        style="max-width: 92%; max-height:100%; min-height: 100%;">
        <form id="itemForm" method="POST"
            action="{{ $mode === 'edit' ? route('item.update', $item->slug) : route('item.store') }}">
            @csrf
            @if ($mode === 'edit')
                @method('PUT')
            @endif

            <!-- Item Name -->
            <div class="mb-4">
                <label for="itemName" class="form-label nunito-bold text-2xl">Item Name</label>
                <input type="text" name="name" class="form-control" id="itemName"
                    placeholder="Enter the name of your item..."
                    value="{{ old('name', $mode === 'edit' ? $item->name : '') }}" required>
            </div>

            <!-- Item Category -->
            <div class="mb-4">
                <label class="form-label nunito-bold text-2xl">Item Category</label>
                <div class="row gy-2">
                    @foreach (['Personal Care', 'Foods', 'Beverages', 'Kitchen Needs', 'Household Essentials', 'Health Supplies'] as $category)
                        <div class="col-6 col-md-4">
                            <button type="button"
                                class="w-100 btn bg-putihpalette montserrat-semibold category-btn text-dark p-2"
                                data-category="{{ $category }}"
                                data-category-id="{{ $category }}">
                                {{ $category }}
                            </button>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="category" id="selectedCategory"
                    value="{{ $mode == 'edit' ? $item->category->category : '' }}">

                <div id="categoryError" class="text-danger mt-2" style="display: none;">
                    Please select an item category
                </div>
            </div>

            <!-- Item Sub-Category (Awalnya Hidden) -->
            <div class="mb-4" id="subcategoryContainer" style="display: none;">
                <label for="itemSubCategory" class="form-label nunito-bold text-2xl">Item Sub-Category</label>
                <select class="form-control" name="subcategory" id="subcategoryList" required>
                    <option value="" disabled {{ $mode == 'create' ? 'selected' : '' }}>Select item sub-category
                    </option> <!-- Placeholder -->
                    <!-- Sub-category options bakal muncul secara dinamis tergantung yang dipilih -->
                </select>
            </div>

            <!-- Item Details -->
            <div class="mb-4">
                <label for="itemDetails" class="form-label nunito-bold text-2xl">Item Details</label>

                <div id="dateContainer"> <!-- Tempat untuk menambah input tanggal -->
                    @php
                        $expDates = $mode === 'edit' ? $item->expirationDates : collect([null]);
                    @endphp

                    @foreach ($expDates as $index => $exp)
                        @if ($mode === 'create' || $exp)
                            <div class="date-item mb-4" {{ $index === 0 ? 'data-fixed=true' : '' }}>
                                <div class="d-flex flex-row align-items-center rounded border border-dark shadow-sm p-3 bg-putih pe-5"
                                    style="opacity: 1; max-width: 500px;">
                                    <!-- Icon Kalender -->
                                    <img src="{{ asset('img/CalendarGreen.svg') }}" alt="Calendar Icon" class="me-3"
                                        style="width: 85px; height: 85px;">

                                    <div class="d-flex flex-column w-100">
                                        <!-- Judul -->
                                        <div class="d-flex justify-content-between align-items-center text-dark">
                                            <h1 class="montserrat-semibold text-xl pt-2">Date {{ $index + 1 }}</h1>

                                            <!-- Tombol +/- -->
                                            <div class="d-flex align-items-center pe-5">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-dark px-2 py-0 decreaseBtn">-</button>

                                                <input type="hidden" name="qty[]" class="qty-input"
                                                    value="{{ old('qty.' . $index, $exp->qty ?? 1) }}">
                                                <span class="mx-2 poppins-semibold text-sm text-center quantity-display"
                                                    style="min-width: 30px">{{ old('qty.' . $index, $exp->qty ?? 1) }}</span>

                                                <button type="button"
                                                    class="btn btn-sm btn-outline-dark px-2 py-0 increaseBtn">+</button>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-2">
                                            <!-- Input tanggal -->
                                            <div class="input-group shadow-sm rounded border">
                                                <input type="date" name="date[]"
                                                    class="form-control border-0 bg-putihpalette nunito-medium"
                                                    value="{{ old('date.' . $index, $exp->expiration_date ?? '') }}"
                                                    required>
                                            </div>

                                            {{-- Delete --}}
                                            <img src="{{ asset('img/trashbin black.svg') }}" alt="Delete"
                                                class="icon-trash mt-1 delete-btn"
                                                style="width: 3.5vw; height: 3.5vh; cursor: pointer;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div id="deletionError" class="text-danger mt-0 mb-4" style="display: none;">
                        Date 1 cannot be deleted
                    </div>
                </div>

                <!-- Button Add More Dates -->
                <button type="button" class="btn btn-putih px-4 p-2 shadow-lg mt-1" id="addMoreBtn">
                    <span class="nunito-bold">Add More Dates</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-plus pb-1" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                </button>
            </div>

            <!-- Item Location -->
            <div class="mb-4">
                <label for="itemLocation" class="form-label nunito-bold text-2xl">Item Stored Location</label>
                <input type="text" name="location" class="form-control" id="itemLocation"
                    placeholder="Enter the item stored location..."
                    value="{{ old('location', $mode === 'edit' ? $item->location : '') }}" required>
            </div>

            <!-- Notes -->
            <div class="mb-4">
                <label for="itemNote" class="form-label nunito-bold text-2xl">Add Note</label>
                <textarea name="note" class="form-control" id="itemNote" rows="4"
                    placeholder="Enter note about the item..." required>{{ old('note', $mode === 'edit' ? $item->note : '') }}</textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-orange px-4 p-2 shadow-lg nunito-bold">Submit</button>
        </form>
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

                    <button type="button" class="btn btn-merah d-flex align-items-center gap-2 px-4"
                        data-bs-dismiss="modal" id="deleteConfirmBtn">
                        Delete
                        <img src="/img/trashbin white icon.svg" alt="Delete" width="20" height="20">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // INI SCRIPT UNTUK SUB-CATEGORIES
        const categories = {
            "Personal Care": ["Makeup & Cosmetics", "Body Care", "Facial Care", "Hair Care", "Fragrances",
                "Feminine Hygiene & Diapers", "Oral Care", "Others (Personal Care)"
            ],
            "Foods": ["Instant Food", "Snacks", "Canned Food", "Spreads & Cereals", "Others (Foods)"],
            "Beverages": ["Dairy Products", "Soft Drinks", "Instant Beverages", "Others (Beverages)"],
            "Kitchen Needs": ["Kitchen & Dining Utensils", "Seasonings & Spices", "Baking Ingredients",
                "Cooking Ingredients", "Others (Kitchen Needs)"
            ],
            "Household Essentials": ["Cleaning & Care Products", "Home Utilities", "Fresheners & Dehumidifiers",
                "Pest Control", "Others (Household Essentials)"
            ],
            "Health Supplies": ["Medicines", "Vitamins & Supplements", "Medical Devices", "Hygiene Products", "Others (Health Supplies)"]
        };

        const categoryButtons = document.querySelectorAll('.category-btn');
        const subCategoryContainer = document.getElementById('subcategoryContainer');
        const subCategoryList = document.getElementById('subcategoryList');
        const categoryError = document.getElementById('categoryError');
        const selectedCategoryInput = document.getElementById('selectedCategory');

        // Initially, subcategory section should be hidden and placeholder displayed
        subCategoryContainer.style.display = 'none';

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.dataset.category;
                selectedCategoryInput.value = category;
                categoryError.style.display = 'none';

                // Clear previous subcategories and show new ones
                subCategoryList.innerHTML =
                    '<option value="" disabled selected>Select item sub-category</option>'; // Reset placeholder
                const subCategories = categories[category];

                // Populate subcategory dropdown
                subCategories.forEach(subCategory => {
                    const option = document.createElement('option');
                    option.value = subCategory;
                    option.textContent = subCategory;
                    subCategoryList.appendChild(option);
                });

                // Show the subcategory section
                subCategoryContainer.style.display = 'block';
            });
        });

        // Show category error if no category selected
        document.getElementById('itemForm').addEventListener('submit', (event) => {
            if (!selectedCategoryInput.value) {
                event.preventDefault();
                categoryError.style.display = 'block';
            }
        });

        // INI SCRIPT UNTUK ADD MORE DATES & YANG QUANTITY
        document.addEventListener("DOMContentLoaded", function() {
            let addMoreBtn = document.getElementById('addMoreBtn');
            let dateContainer = document.getElementById('dateContainer');
            let deleteConfirmBtn = document.getElementById('deleteConfirmBtn');
            let itemToDelete = null; // Variabel untuk menyimpan item yang akan dihapus

            // Fungsi untuk menambah input tanggal
            addMoreBtn.addEventListener('click', function() {
                // Membuat container baru untuk input tanggal
                let dateItems = dateContainer.querySelectorAll('.date-item'); // ambil semua .date-item
                let newIndex = dateItems.length + 1;

                let newDateItem = document.createElement('div');
                newDateItem.classList.add('date-item', 'mb-4');

                // Menambahkan HTML untuk Date Baru
                newDateItem.innerHTML = `
                    <div class="d-flex flex-row align-items-center rounded border border-dark shadow-sm p-3 bg-putih pe-5" style="opacity: 1; max-width: 500px;">
                        <!-- Icon Kalender -->
                        <img src="{{ asset('img/CalendarGreen.svg') }}" alt="Calendar Icon" class="me-3" style="width: 85px; height: 85px;">

                        <div class="d-flex flex-column w-100">
                            <!-- Judul -->
                            <div class="d-flex justify-content-between align-items-center text-dark">
                                <h1 class="montserrat-semibold text-xl pt-2">Date ${newIndex}</h1>

                                <!-- Tombol +/- -->
                                <div class="d-flex align-items-center pe-5">
                                    <button type="button" class="btn btn-sm btn-outline-dark px-2 py-0 decreaseBtn">-</button>
                                    <input type="hidden" name="qty[]" class="qty-input" value="1">
                                    <span class="mx-2 poppins-semibold text-sm text-center quantity-display" style="min-width: 30px">1</span>
                                    <button type="button" class="btn btn-sm btn-outline-dark px-2 py-0 increaseBtn">+</button>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <!-- Input tanggal -->
                                <div class="input-group shadow-sm rounded border">
                                    <input type="date" name="date[]" class="form-control border-0 bg-putihpalette nunito-medium" placeholder="dd/mm/yyyy" required>
                                </div>

                                {{-- Delete --}}
                                <img src="{{ asset('img/trashbin black.svg') }}"
                                    alt="Delete"
                                    class="icon-trash mt-1 delete-btn"
                                    style="width: 3.5vw; height: 3.5vh; cursor: pointer;">
                            </div>
                        </div>
                    </div>
                `;

                // Menambahkan container baru ke dalam dateContainer
                dateContainer.appendChild(newDateItem);
                updateDateNumbers();
            });

            // Gunakan event delegation untuk menangani klik tombol +/- pada semua date-item
            dateContainer.addEventListener('click', function(event) {
                // Untuk handle quantity buttons
                if (event.target.classList.contains('decreaseBtn')) {
                    const quantityDisplay = event.target.closest('.pe-5').querySelector(
                    '.quantity-display');
                    const hiddenInput = event.target.closest('.date-item').querySelector('.qty-input');
                    let currentQty = parseInt(quantityDisplay.innerText);
                    if (currentQty > 1) {
                        currentQty -= 1;
                        quantityDisplay.innerText = currentQty;
                        if (hiddenInput) hiddenInput.value = currentQty;
                    }
                } else if (event.target.classList.contains('increaseBtn')) {
                    const quantityDisplay = event.target.closest('.pe-5').querySelector(
                    '.quantity-display');
                    const hiddenInput = event.target.closest('.date-item').querySelector('.qty-input');
                    let currentQty = parseInt(quantityDisplay.innerText);
                    currentQty += 1;
                    quantityDisplay.innerText = currentQty;
                    if (hiddenInput) hiddenInput.value = currentQty;
                }

                // Untuk handle delete button
                if (event.target.classList.contains('delete-btn')) {
                    itemToDelete = event.target.closest('.date-item') // Simpan item yang akan dihapus
                    let dateTitle = itemToDelete.querySelector('h1');

                    // Jika item yang akan dihapus memiliki atribut data-fixed="true", maka larang hapus
                    if (itemToDelete && itemToDelete.getAttribute('data-fixed') === 'true') {
                        let errorMessage = document.getElementById('deletionError');
                        errorMessage.style.display = 'block'; // Tampilkan error message
                        itemToDelete = null; // Reset agar tidak bisa lanjut hapus
                        return;
                    } else {
                        // Jika bukan Date 1, sembunyikan pesan error
                        let errorMessage = document.getElementById('deletionError');
                        errorMessage.style.display = 'none';

                        // Tampilkan modal konfirmasi
                        let deleteModal = new bootstrap.Modal(document.getElementById(
                            'deleteConfirmationModal'));
                        deleteModal.show();
                    }
                }
            });

            // Konfirmasi hapus item setelah klik konfirmasi di modal
            deleteConfirmBtn.addEventListener('click', function() {
                if (itemToDelete) {
                    itemToDelete.remove(); // Hapus item
                    updateDateNumbers(); // Perbarui nomor date setelah hapus
                    itemToDelete = null; // Reset
                }
            });

            // Fungsi untuk memperbarui nomor Date
            function updateDateNumbers() {
                let dateItems = dateContainer.querySelectorAll('.date-item');
                dateItems.forEach((item, index) => {
                    let dateNumber = item.querySelector('h1');
                    dateNumber.textContent = `Date ${index + 1}`; // Update urutan
                });
            }
        });

        @if ($mode == 'edit')
            document.addEventListener("DOMContentLoaded", function() {
                const selectedCategory = document.getElementById('selectedCategory').value;
                const matchedBtn = Array.from(document.querySelectorAll('.category-btn')).find(btn => btn.dataset
                    .category === selectedCategory);

                if (matchedBtn) {
                    matchedBtn.click(); // trigger klik tombol kategori

                    // Tambahan: beri border dan warna pakai style di app.js
                    matchedBtn.classList.add("active", "selected", "border", "border-dark");

                    const categoryColors = {
                        "Personal Care": "#F8C8DC",
                        "Foods": "#CD4361",
                        "Beverages": "#99D8F0",
                        "Kitchen Needs": "#D29375",
                        "Household Essentials": "#9CBA7F",
                        "Health Supplies": "#E86060",
                    };
                    const categoryName = matchedBtn.textContent.trim();
                    const color = categoryColors[categoryName] || "#ffffff";
                    matchedBtn.style.setProperty("background-color", color, "important");
                    matchedBtn.style.setProperty("color", "#000", "important");

                    subcategoryContainer.style.display = 'block';
                }

                // Set subcategory value again (to make sure it matches the dropdown)
                const subCatSelect = document.getElementById('subcategoryList');
                const subCatValue = "{{ $item->subcategory->subcategory }}";

                if (subCatSelect && subCatValue) {
                    for (let i = 0; i < subCatSelect.options.length; i++) {
                        if (subCatSelect.options[i].value === subCatValue) {
                            subCatSelect.options[i].selected = true;
                            break;
                        }
                    }
                }
            });
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
