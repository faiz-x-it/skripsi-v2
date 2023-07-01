@extends('layouts.master')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
<link href="{{ asset("/themes/css/bootstrap.css") }}" rel="stylesheet">
<link href="{{ asset("/themes/css/style.css") }}" rel="stylesheet">
<link href="{{ asset("/themes/css/responsive.css") }}" rel="stylesheet">

@section('title')
Getfast - produk
@endsection
@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-area">
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4 class="text-white">produk Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-4">
                                        <div class="book-img-details">

                                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                  <div class="carousel-item active">
                                                    <img src="{{$produk->image_url}}" class="d-block w-100" alt="{{$produk->image_url}}">
                                                  </div>
                                                  <div class="carousel-item">
                                                    <img src="{{$produk->image_url2}}" class="d-block w-100" alt="{{$produk->image_url2}}">
                                                  </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Next</span>
                                                </button>
                                              </div>
                                             
                                            {{--<img src="{{$book->image_url}}" alt="">
                                            <img src="{{$book->image_url2}}" alt=""> --}}
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="book-title">
                                            <h5>{{$produk->title}}</h5>
                                        </div>
                                        <div class="author mb-2">
                                            {{-- By <a href="{{route('author', $produk->author->slug)}}">{{$produk->author->name}}</a> --}}
                                        </div>
                                        @if(($produk->quantity) > 1)
                                            <div class="badge badge-success mb-2">Tersedia</div>
                                        @else
                                            <div class="badge badge-danger mb-2">Habis</div>
                                        @endif
                                        @if($produk->discount_rate)
                                            <h6><span class="badge badge-warning">{{$produk->discount_rate}}% Diskon</span></h6>
                                        @endif
                                        <div class="book-price mb-2">
                                            <span class="mr-1">mulai dari</span>
                                            @if($produk->discount_rate)
                                                <span></span><strong class="line-through">Rp. {{$produk->init_price}}</strong>
                                            @endif
                                                <span>menjadi </span><strong>Rp. {{$produk->price}}</strong>
                                            @if($produk->discount_rate)
                                                <div><strong class="text-danger">hemat Rp. {{$produk->init_price - $produk->price}}</strong></div>
                                            @endif
                                        </div>
                                        <div class="book-category mb-2 py-1 d-flex flex-row border-top border-bottom">
                                            {{-- <a href="{{route('category', $produk->category->slug)}}" class="mr-4"><i class="fas fa-folder"></i> {{$produk->category->name}}</a> --}}
                                            <a href="#review-section" class="mr-4"><i class="fas fa-comments"></i> Reviews</a>
                                        </div>

                                        <form action="{{route('cart.add')}}" method="post">
                                            @csrf
                                            <div class="cart">
                                            <span class="quantity-input mr-2 mb-2">
                                                <a href="#" class="cart-minus" id="cart-minus">-</a>
                                                <input title="QTY" name="quantity" type="text" value="1" class="qty-text">
                                                <a href="#" class="cart-plus" id="cart-plus">+</a>
                                            </span>
                                                <input type="hidden" name="book_id" value="{{$produk->id}}"><br>
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i> tambah ke troli </button>
                                            </div>
                                        </form>
                                        <form action="{{route('cart.add_now')}}" method="post">
                                            @csrf
                                            <div class="cart">
                                            <span class="quantity-input mr-2 mb-2">
                                                <a hidden href="#" class="cart-minus" id="cart-minus">-</a>
                                                <input hidden title="QTY" name="quantity" type="text" value="1" class="qty-text">
                                                <a hidden href="#" class="cart-plus" id="cart-plus">+</a>
                                            </span>
                                                <input type="hidden" name="book_id" value="{{$produk->id}}"><br>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-shopping-cart"></i> beli sekarang </button>
                                            </div>
                                        </form>

                                        @include('layouts.includes.flash-message')
                                    </div>
                                </div>

                                <div class="card my-4">
                                    <div class="card-header bg-dark">
                                        <h4 class="text-white">Produk yang Serupa</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="theme">
                                            <label class="form-check-label" for="theme">
                                                Tema
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="color">
                                            <label class="form-check-label" for="color">
                                                Warna
                                            </label>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            @if($similarProducts->count() > 0)
                                                @foreach($similarProducts as $similarProduct)
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <img src="{{$similarProduct->image_url}}" class="card-img-top" alt="{{$similarProduct->image_url}}">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{$similarProduct->title}}</h5>
                                                                <p class="card-text">{{$similarProduct->description}}</p>
                                                                <a href="{{route('product.show', $similarProduct->id)}}" class="btn btn-primary">Lihat Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12">
                                                    <p>Tidak ada produk serupa.</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="book-description p-3">
                                        <p>{!! Markdown::convertToHtml(e($produk->description)) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card card-body my-4">
                            <div class="author-description d-flex flex-row">
                                <div class="author-img mr-4">
                                    <img src="{{$produk->author->image? $produk->author->image_url : $produk->default_img}}" alt="">
                                </div>
                                <div class="des">
                                    <h5><a href="{{route('author', $produk->author->slug)}}">{{$produk->author->name}}</a></h5>
                                    <small>
                                        <a href="{{route('author', $produk->author->slug)}}">
                                            <i class="fas fa-book"></i>
                                            {{$produk->author->books()->count()}}
                                            {{str_plural('Book', $produk->author->books()->count())}}
                                        </a>
                                    </small>
                                    <p>{!! Markdown::convertToHtml(e($produk->author->bio)) !!}</p>
                                </div>
                            </div>
                        </div> --}}

                        <!-- COMMENTS HERE -->
                        @include('layouts.includes.reviews')
                    </div>
                </div>
                <!-- Sidebar -->
                    @include('layouts.includes.side-bar')
                <!-- Sidebar end -->
                
            </div>
        </div>
    </section>
@endsection
<script src="{{ asset("/themes/js/jquery.js") }}"></script>
<script src="{{ asset("/themes/js/popper.min.js") }}"></script>
<script src="{{ asset("/themes/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/themes/js/jquery.mCustomScrollbar.concat.min.js") }}"></script>
<script src="{{ asset("/themes/js/jquery.fancybox.js") }}"></script>
<script src="{{ asset("/themes/js/appear.js") }}"></script>
<script src="{{ asset("/themes/js/parallax.min.js") }}"></script>
<script src="{{ asset("/themes/js/tilt.jquery.min.js") }}"></script>
<script src="{{ asset("/themes/js/jquery.paroller.min.js") }}"></script>
<script src="{{ asset("/themes/js/owl.js") }}"></script>
<script src="{{ asset("/themes/js/mixitup.js") }}"></script>
<script src="{{ asset("/themes/js/wow.js") }}"></script>
<script src="{{ asset("/themes/js/nav-tool.js") }}"></script>
<script src="{{ asset("/themes/js/jquery-ui.js") }}"></script>
<script src="{{ asset("/themes/js/jquery.bootstrap-touchspin.js") }}"></script>
<script src="{{ asset("/themes/js/script.js") }}"></script>
<script src="{{ asset("/themes/js/color-settings.js") }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}