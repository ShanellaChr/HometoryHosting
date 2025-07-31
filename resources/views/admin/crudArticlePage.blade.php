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

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <title>Hometory - Create Article</title>
</head>

<body style="height: 100%;">
    <!-- Header -->
    <div class="bg-birupalette py-3 px-4 d-flex align-items-center" style="height: 5vw;">
        <a href="/admin">
            <img src="{{ asset('img/White Back Button.svg') }}" alt="Back" class="BackButton"
                style="width: 40px; height: 40px;">
        </a>
    </div>

    <div class="text-center mt-5">
        <h1 class="montserrat-bold text-5xl">Create <span class="text-orenyedija">Article</span></h1>
        <p class="montserrat-semibold">Make it <span class="fw-bold">Wisely</span></p>
    </div>

    <div class="container mt-4 p-4 ps-5 pe-5 rounded-4 bg-abupalette text-white mb-0"
        style="max-width: 92%; max-height:100%; min-height: 100%;">

        <form id="AddArticleForm" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Item Name -->
            <div class="mb-4">
                <label for="itemName" class="form-label nunito-bold text-2xl">Title of article</label>
                <input type="text" name="title" class="form-control" id="itemName" placeholder="Title here"
                    required>
            </div>

            <!-- Upload Image -->
            <div class="mb-4">
                <label for="itemName" class="form-label nunito-bold text-2xl">Article Image</label>
                <div id="uploadPrompt">
                    <label for="fileUpload"
                        class="border border-2 border-secondary border-dashed rounded-3 bg-white text-center p-5 d-block"
                        style="cursor: pointer;">        
                        <i class="bi bi-cloud-arrow-up fs-1 text-secondary"></i>
                        <p class="my-1 fw-semibold text-dark">Click to upload</p>
                        <p class="text-muted small">or drag and drop<br>SVG, PNG, JPG (MAX. 5 MB each)</p>
                        
                    </label>
                </div>
                <input type="file" class="d-none" id="fileUpload" name="thumbnail" accept=".png,.jpg,.jpeg,.svg">

                <div id="uploadedInfo" style="display: none; cursor: pointer" class="text-center mt-3">
                    <img id="previewImage" src="" alt="Preview" class="img-fluid rounded mb-2" style="max-height: 150px;">
                    <p id="fileName" class="small text-white" ></p>
                </div>

                <div id="imageError" class="text-danger mt-2" style="display: none;">
                    Please Input an image.
                </div>
            </div>

            <!-- Description -->
            <label for="itemDesc" class="form-label nunito-bold text-2xl">Article Description</label>

            <div class="border border-2 border-secondary border-dashed rounded-3 bg-white p-2 mb-3">
                <input id="my_input" type="hidden" name="content">
                <trix-editor input="my_input" style="color: black"></trix-editor>

                <div id="trixError" class="text-danger mt-2" style="display: none;">
                    Please fill in the content.
                </div>

            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-orange px-4 p-2 shadow-lg nunito-bold">Submit</button>
        </form>
    </div>

    <script>
        const imageError = document.getElementById('imageError');
        const fileUpload = document.getElementById('fileUpload');
        const addArticleForm = document.getElementById('AddArticleForm');
        const myInput = document.getElementById('my_input');
        const trixError = document.getElementById('trixError');
        const uploadPrompt = document.getElementById('uploadPrompt');
        const uploadedInfo = document.getElementById('uploadedInfo');
        const previewImage = document.getElementById('previewImage');
        const fileName = document.getElementById('fileName');

        uploadedInfo.addEventListener('click', function() {
            fileUpload.click();
        });

        addArticleForm.addEventListener('submit', function(event) {

            const value = myInput.value.replace(/<[^>]+>/g, '').trim();

            if (fileUpload.files.length === 0) {
                event.preventDefault();
                imageError.textContent = 'Please Input an image.';
                imageError.style.display = 'block';
            } else {
                imageError.style.display = 'none';
            }

            if (value === '') {
                event.preventDefault();
                trixError.style.display = 'block';
            } else {
                trixError.style.display = 'none';
            }

        });

        fileUpload.addEventListener('change', function(event){
            const file = event.target.files[0];
            const maxSize = 5 * 1024 * 1024;

            if(file){
                if(file.size > maxSize){
                    // Pesan error
                    imageError.textContent = 'File is too large! Maximum size is 5 MB.';
                    imageError.style.display = 'block';
                    fileUpload.value = '';

                    // Reset UI ke tampilan awal
                    uploadPrompt.style.display = 'block';
                    uploadedInfo.style.display = 'none';
                    return;
                }

                imageError.style.display = 'none'; 
                uploadPrompt.style.display = 'none';
                uploadedInfo.style.display = 'block';
                fileName.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>
