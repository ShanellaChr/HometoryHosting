@section('title', 'Hometory')
<x-master>

    <div class="p-2 position-relative d-flex">
        <img class="z-0" style="width: 100%;" src="{{ asset('img/Background_Homepage.svg') }}" alt="">

        <div class="z-10 position-absolute top-50 start-50 translate-middle text-center">
            <h1 class="text-orenpalette montserrat-bold" style="letter-spacing: 0.3vw;  font-size:2vw">HOMETORY</h1>
            <h1 class="text-white montserrat-bold text-6xl" style="letter-spacing: 0.3vw">TRACK SMARTER</h1>
            <h1 class="text-white montserrat-bold text-6xl" style="letter-spacing: 0.3vw">WASTE NO MORE!</h1>
            <p class="text-white nunito-medium">A flexible and structured inventory system allows users to record and
                organize household items with ease. It helps streamline daily management, minimize waste, and maintain
                clarity over available supplies at home.</p>

            <a href="{{ route('item.index') }}">
                <button type="button" class="btn montserrat-bold text-white mt-3 btn-orange-gelap">
                    GET STARTED
                </button>
            </a>
        </div>
    </div>

    {{-- Judul Our Feature --}}
    <div>
        <p class="d-flex justify-content-center align-items-center mt-4 montserrat-bold text-5xl mb-0">Our<span
                class="ms-3 text-orenyedija">Feature</span></p>

        <p class="text-center nunito-regular mb-0">Discover smart tools to organize your inventory with ease!</p>

        <div class=" bg-orenyedija mx-auto mt-3" style="width: 7vw; height: 0.5vh;"></div>
    </div>

    {{-- Isi Our Feature --}}

    <div class="d-flex m-5 justify-content-center align-self-center text-center pb-5">

        <a href="{{ route('item.index') }}"
            class=" shadow p-3 d-flex flex-column col m-3 align-items-center rounded-4 text-decoration-none text-black">
            <img src="{{ asset('img/Inventory Icon Home.svg') }}" alt="">
            <p class="nunito-bold m-3">My Inventory</p>
            <p class="mb-0 nunito-regular"> This feature serves as the core of the system, allowing users to input,
                update, and monitor all item details, such as quantity, category, and location, ensuring accurate
                stock control</p>
        </a>

        <a href="{{ route('calendar.show') }}"
            class=" shadow p-3 d-flex flex-column col m-3 align-items-center rounded-4 text-decoration-none text-black">
            <img src="{{ asset('img/Calendar Icon Home.svg') }}" alt="">
            <p class="nunito-bold m-3">Calendar</p>
            <p class="mb-0 nunito-regular"> This feature helps users keep track of important inventory-related
                activities by scheduling restock dates, tracking item inflows and outflows, and setting reminders
                for timely actions</p>
        </a>

        <a href="{{ route('statistic.page') }}"
            class=" shadow p-3 d-flex flex-column col m-3 align-items-center rounded-4 text-decoration-none text-black">
            <img src="{{ asset('img/Statistic Icon Home.svg') }}" alt="">
            <p class="nunito-bold m-3">Statistic</p>
            <p class="mb-0 nunito-regular"> With this feature, users can visualize their inventory data with charts
                and graphs, making it easier to identify trends, evaluate stock performance, and make data-driven
                decisions.</p>
        </a>

        <a href="{{ route('wishlist') }}"
            class=" shadow p-3 d-flex flex-column col m-3 align-items-center rounded-4 text-decoration-none text-black">
            <img src="{{ asset('img/Wishlist Icon Home.svg') }}" alt="">
            <p class="nunito-bold m-3">Wishlist</p>
            <p class="mb-0 nunito-regular"> This feature enables users to create a personalized list of items they
                intend to purchase or add to their inventory in the future, supporting better planning and budgeting.
            </p>
        </a>

        <a href="{{ route('article.index') }}"
            class=" shadow p-3 d-flex flex-column col m-3 align-items-center rounded-4 text-decoration-none text-black">
            <img src="{{ asset('img/Article Icon Home.svg') }}" alt="">
            <p class="nunito-bold m-3">Article</p>
            <p class="mb-0 nunito-regular"> This section offers informative content, practical tips, and user guides
                about inventory management to enhance user knowledge and help them maximize the platform’s capabilities.
            </p>
        </a>

    </div>

    {{-- About Hometory --}}

    <div class="py-5" style="box-shadow: inset 0 0.5vh 1vh rgba(0, 0, 0, 0.2); background-color:#F3F3F3">

        {{-- judul --}}

        <div>
            <p class="d-flex justify-content-center align-items-center montserrat-bold text-5xl mb-0">About<span
                    class="ms-3 text-orenyedija">Hometory</span></p>

            <p class="text-center nunito-regular mb-0">Get to know about <span class="nunito-bold">Hometory</span></p>

            <div class=" bg-orenyedija mx-auto mt-3" style="width: 7vw; height: 0.5vh;"></div>
        </div>

        <p class="text-center text-1xl pt-4" style="padding-inline: 10vw">Hometory is A web-based platform that helps
            families and individuals efficiently and responsibly record, manage, and control household necessities.
            Embracing the spirit of Sustainable Development Goal (SDG) 12, Hometory aims to promote mindful consumption
            behavior, reduce waste, and raise awareness about resource usage at home.</p>

    </div>

    {{-- Feedback dari user --}}
    {{-- Feedback dari user --}}
<div class="d-flex align-items-center justify-content-center mt-5 mb-5 gap-3">

    <button onclick="showPrev()" class=" border-0 bg-transparent p-5">
        <i
            class="btn btn-outline-dark bi bi-caret-left-fill rounded-circle d-flex justify-content-center align-items-center p-2 shadow"></i>
    </button>

    <div id="comment-wrapper" style="overflow: hidden; width: 100%;">
        <div id="comment-container" class="d-flex flex-row" style="transition: transform 0.5s ease;">
            {{-- render comment di JS --}}
        </div>
    </div>

    <button onclick="showNext()" class=" border-0 bg-transparent p-5">
        <i
            class="btn btn-outline-dark bi bi-caret-right-fill rounded-circle d-flex justify-content-center align-items-center p-2 shadow"></i>
    </button>

</div>

<script>
    const comments = [
        {
            name: "Christina",
            time: "1 day ago",
            comment: "Website ini sangat membantu dalam mengatur inventaris barang pribadi saya. UI-nya intuitif dan mudah digunakan. Terima kasih tim developer!"
        },
        {
            name: "Angjaya",
            time: "2 months ago",
            comment: "Awalnya saya ragu, tapi setelah mencoba, ternyata sangat berguna untuk memantau masa kedaluwarsa barang di rumah. Fitur notifikasinya sangat membantu."
        },
        {
            name: "Sutara",
            time: "1 year ago",
            comment: "Platform ini cocok banget buat orang yang sering lupa stok barang di rumah. Bisa lebih hemat karena nggak beli barang yang sudah ada."
        },
        {
            name: "Handoyo",
            time: "7 months ago",
            comment: "Saya menggunakan website ini untuk keperluan kantor kecil kami. Cukup efektif dalam memantau barang masuk dan keluar."
        },
        {
            name: "Hazael",
            time: "1 week ago",
            comment: "Antarmukanya simpel dan bersih. Cocok untuk semua kalangan, baik yang paham teknologi maupun tidak. Semoga terus dikembangkan."
        },
        {
            name: "Alhe18m",
            time: "1 second ago",
            comment: "Bangga dengan buatan anak anak kelas ini"
        },
    ];

    let startIndex = 0;
    const itemsPerPage = 3;

    function renderCommentsOnce() {
        const container = document.getElementById("comment-container");
        container.innerHTML = "";

        comments.forEach((item, index) => {
            const div = document.createElement("div");
            div.className = "shadow p-3 rounded-3";
            div.style = "width: 100%; max-width: 380px; margin-top:20px; margin-bottom:20px; margin-inline:20px; height: auto; flex-shrink: 0;";
            div.innerHTML = `
                <div class="d-flex flex-row">
                    <img src="{{ asset('img/Profil Dummy.svg') }}" alt="">
                    <div class="ms-2">
                        <p class="mb-0 poppins-medium text-orenyedija" style="font-size: 1.5vw">${item.name}</p>
                        <p class="mb-0 poppins-medium opacity-75" style="font-size: 0.8vw">${item.time}</p>
                    </div>
                </div>
                <p class="mb-0 mt-3 poppins-medium" style="font-size: 0.9vw">${item.comment}</p>
            `;
            container.appendChild(div);
        });

        updateSliderPosition();
    }

    function updateSliderPosition() {
        const container = document.getElementById("comment-container");
        const commentCard = container.querySelector("div");
        if (!commentCard) return;

        const cardWidth = commentCard.offsetWidth;
        const offset = startIndex * (cardWidth + 60);
        container.style.transform = 'translateX(-' + offset + 'px)';
    }

    function showNext() {
        if (startIndex + itemsPerPage < comments.length) {
            startIndex++;
        } else {
            startIndex = 0;
        }
        updateSliderPosition();
    }

    function showPrev() {
        if (startIndex > 0) {
            startIndex--;
        } else {
            startIndex = comments.length - itemsPerPage;
        }
        updateSliderPosition();
    }

    window.onload = function () {
        renderCommentsOnce();
    };
</script>

</x-master>
