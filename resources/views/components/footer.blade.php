<footer class="text-center py-3 poppins-regular" style="background-color: #011638">
    <img class="pt-3" style="width: 22vw" src="{{ asset('img/footer Logo.svg') }}" alt="">

    <div class=" d-flex justify-content-center gap-4 m-4" >
        <a class="text-white navbar-hover" style="text-decoration:none" href="{{ route('item.index') }}">My Inventory</a>
        <a class="text-white navbar-hover" style="text-decoration:none" href="{{ route('calendar.show') }}">Calendar</a>
        <a class="text-white navbar-hover" style="text-decoration:none" href="{{ route('statistic.page') }}">Statistic</a>
        <a class="text-white navbar-hover" style="text-decoration:none" href="{{ route('wishlist') }}">Wishlist</a>
        <a class="text-white navbar-hover" style="text-decoration:none" href="{{ route('article.index') }}">Article</a>
    </div>
 
    <div class=" d-flex justify-content-center gap-5 m-4">
        <img src="{{ asset('img/Instagram Icon.svg') }}" alt="">
        <img src="{{ asset('img/Facebook Icon.svg') }}" alt="">
        <img src="{{ asset('img/Whatsapp Icon.svg') }}" alt="">
    </div>

    <div class="text-white m-4">
        <p>A stock recording platform that makes it easy for you to manage stock quickly, <br> accurately and efficiently.</p>
        <p>© 2025 CASHH. All Rights Reserved.</p>
    </div>
    

</footer>
