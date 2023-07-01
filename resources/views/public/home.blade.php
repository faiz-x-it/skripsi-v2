@extends('layouts.master')

@section('content')
    <!-- Slider Area -->
    {{-- <section class="welcome-area">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slider-img slider-bg-1"></div>
                    <div class="carousel-caption">
                        <h2>Book of Love</h2>
                        <p class="d-none d-md-block">Let the pain itself be loved, enhanced, adipisicing. The wise man of their labors.
                            Because of the hardships we have in our offices, the practice of cheering for forgiveness will indeed come to pass.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-img slider-bg-2"></div>
                    <div class="carousel-caption">
                        <h2>Books of Sacrifice</h2>
                        <p class="d-none d-md-block">The love of the main character, the adipisic The wise man of their labors, is the suffering itself. Duties due to our distress, the practice of appealing for pardon will be implemented.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-img slider-bg-3"></div>
                    <div class="carousel-caption">
                        <h2>Books of Wisdom</h2>
                        <p class="d-none d-md-block">The love of the main character, the adipisic The wise man of their labors, is the suffering itself. Duties due to our distress, the practice of appealing for pardon will be implemented.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="banner-section-two">
        <div class="pattern-layer-one" style="background-image: url(themes/images/main-slider/pattern-4.png)"></div>
        <div class="pattern-layer-two" style="background-image: url(themes/images/main-slider/pattern-5.png)"></div>
        <div class="pattern-layer-three" style="background-image: url(themes/images/main-slider/pattern-6.png)"></div>
        <div class="main-slider-carousel owl-carousel owl-theme">
            @for ($i = 0; $i < 3; $i++)
            <div class="slide">
                <div class="auto-container">
                    <div class="row clearfix">
                        
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="{{ asset("/themes/../images/kaos.png") }}" alt="" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="title">lebih dari 5 tahun kami berkarya</div>
                                <h1>Open Pre-Order </h1><br> <h2>screen printing & embroidery</h2>
                                <div class="text">kami 100% adalah designer profesional <br>lebih dari 5 tahun kami menciptakan 500+ karya unik untuk anda</div>
                                <div class="play-box">
                                    <a href="{{route('all')}}" class="lightbox-image video-box"><span class="flaticon-shopping-bag-1"><i class="ripple"></i><i class="bi bi-tiktok"></i></span></a>
                                    SHOWCASE
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endfor 
        </div>
    </section> --}}

    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Sidebar Content -->
                @include('layouts.includes.side-bar')
                <!-- //Sidebar End -->
                <div class="col-md-8">
                    <div class="content-area">
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4><a href="{{route('discount')}}" class="text-white">Produk diskon</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(! $discount_produk->count())
                                        <div class="alert alert-warning">Tidak ada produk yang tersedia</div>
                                    @else
                                        @foreach($discount_produk as $kaos)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('detail', $kaos->id)}}"><img src="{{$kaos->image_url}}" alt=""></a>
                                                        @if($kaos->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Diskon {{$kaos->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('detail', $kaos->id)}}">{{str_limit($kaos->title, 30)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        {{-- <small>By <a href="{{route('user', $kaos->user->slug)}}">{{$kaos->author->name}}</a></small> --}}
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($kaos->discount_rate)
                                                            <span class="line-through mr-3">Rp. {{$kaos->init_price}}</span><br>
                                                        @endif
                                                        <span class=""><strong>Rp. {{$kaos->price}}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="show-more pt-2 text-right">
                                    <a href="{{route('discount')}}" class="text-secondary">tampilkan lagi <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4><a href="{{route('all')}}" class="text-white">semua produk</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(! $produk->count())
                                        <div class="alert alert-warning">Tidak ada produk yang tersedia</div>
                                    @else
                                    @foreach($produk as $kaos)
                                    <div class="col-lg-3 col-6">
                                        <div class="book-wrap">
                                            <div class="book-image mb-2">
                                                <a href="{{route('detail', $kaos->id)}}"><img src="{{$kaos->image_url}}" alt=""></a>
                                                @if($kaos->discount_rate)
                                                    <h6><span class="badge badge-warning discount-tag">Diskon {{$kaos->discount_rate}}%</span></h6>
                                                @endif
                                            </div>
                                            <div class="book-title mb-2">
                                                <a href="{{route('detail', $kaos->id)}}">{{str_limit($kaos->title, 30)}}</a>
                                            </div>
                                            <div class="book-author mb-2">
                                                {{-- <small>By <a href="{{route('author', $kaos->author->slug)}}">{{$kaos->author->name}}</a></small> --}}
                                            </div>
                                            <div class="pbook-price mb-3">
                                                @if($kaos->discount_rate)
                                                    <span class="line-through mr-3">Rp. {{$kaos->init_price}}</span><br>
                                                @endif
                                                <span class=""><strong>Rp. {{$kaos->price}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="show-more pt-2 text-right">
                                    <a href="{{route('all')}}" class="text-secondary">tampilkan lagi <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
