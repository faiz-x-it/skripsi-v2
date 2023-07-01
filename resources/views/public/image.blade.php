{{-- <div class="image-column col-lg-7 col-md-12 col-sm-12">
    <div class="carousel-outer">
        <ul class="image-carousel owl-carousel owl-theme">
            @foreach(App\Product::all() as $book)
            <li>
                <a href="{{ $book->image_url }}" class="lightbox-image" title="Image Caption Here">
                    <img src="{{ $book->image_url }}" alt="">
                </a>
            </li>
            @endforeach
        </ul>

        <ul class="thumbs-carousel owl-carousel owl-theme">
            @foreach(App\Product::all() as $thumb)
            <li>
                <img src="{{ $book->image_url }}" alt="">
            </li>
            @endforeach
        </ul>
    </div>
</div> --}}

<div class="image-column">
    <div class="carousel-outer">
        <ul class="image-carousel owl-carousel owl-theme">
            @for ($i = 1; $i <= 10; $i++)
            <li>
                <a href="{{ $produk->image_url }}" class="lightbox-image" title="Image Caption Here">
                    <img src="{{ $produk->image_url }}" alt="">
                </a>
            </li>
            @endfor
        </ul>
        <ul class="thumbs-carousel owl-carousel owl-theme">
            @foreach (['14', '15', '16', '17', '14', '15', '16', '17'] as $thumb)
            <li>
                <img src="{{ $produk->image_url }}" alt="">
            </li>
            @endforeach
        </ul>
        {{-- <ul class="thumbs-carousel owl-carousel owl-theme">
            @foreach (['14', '15', '16', '17', '14', '15', '16', '17'] as $thumb)
            <li>
                <img src="{{ asset('/images/resource/products/' . $thumb . '.jpg') }}" alt="">
            </li>
            @endforeach
        </ul> --}}
    </div>
</div>

