@section('title', 'Hometory - Article')
<x-master>
    <div class="d-flex justify-content-center align-items-center pt-7 montserrat-bold text-5xl">Articles to<span class="ms-3 text-orenyedija">Read</span></div>
    <div class="d-flex justify-content-center align-items-center mt-1 mb-5 nunito-regular text-lg">Read more, be smarter!
    </div>
    <div class="container mb-5">
        <div class="container mb-5">
            <div class="row justify-content-center">
                @foreach ($articles as $article)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4 d-flex justify-content-center">
                        <div class="shadow rounded-4 custom-card" style="width: 100%; max-width: 450px;">
                            <div>
                                <a href="{{ route('article.detail', ['slug' => $article->slug]) }}">
                                    <img src="{{ asset('storage/'.$article->thumbnail) }}" alt="{{ $article->title }}"class=" rounded-top-4" style="width: 100%; height: 250px; object-fit:cover;">
                                </a>
                            </div>
                            <div class="p-3">
                                <a href="{{ route('article.detail', ['slug' => $article->slug]) }}" class="text-decoration-none text-dark">
                                    <p class="nunito-extrabold text-xl">{{ $article->title }}</p>
                                </a>
                            </div>
                            <div class="poppins-regular text-md mb-5 ms-3">
                                {{ $article->updated_at->format('F jS, Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-master>
