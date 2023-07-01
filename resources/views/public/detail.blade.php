@extends('layouts.master')

@section('title')
tes
@endsection
<link href="{{ asset("/themes/css/bootstrap.css") }}" rel="stylesheet">
<link href="{{ asset("/themes/css/style.css") }}" rel="stylesheet">
<link href="{{ asset("/themes/css/responsive.css") }}" rel="stylesheet">

@section('content')




    <div class="auto-container">
        <!--Shop Single-->
        <div class="shop-page product-details">
            <!--Basic Details-->
            <div class="row">
                <div class="col-md-8">
                    <div class="content-area">
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4 class="text-white">produk Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="book-img-details">
                                            @include('public.image')

                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="book-title">
                                            <h5>{{$produk->title}}</h5>
                                        </div>
                                        <div class="author mb-2">
                                       
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
                                            <div class="cart"><div class="col-6">
                                                        <span class="quantity-input mr-2 mb-2">
                                                            <a href="#" class="cart-minus" id="cart-minus">-</a>
                                                            <input title="QTY" name="quantity" type="text" value="1" class="qty-text">
                                                            <a href="#" class="cart-plus" id="cart-plus">+</a>
                                                        </span>
                                                    </div></div>
                                            
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
                                                <button type="submit" class="theme-btn btn-style-three"><span class="txt"></i> beli sekarang</span> </button>
                                            </div>
                                        </form>

                                        @include('layouts.includes.flash-message')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product Info Tabs-->
            <div class="product-info-tabs">
                <!--Product Tabs-->
                @include('public.detail-product')
            </div>
            <!--End Product Info Tabs-->
                        
                    </div>
                </div>
                <!-- Sidebar -->
                    @include('layouts.includes.side-bar')
                <!-- Sidebar end -->
                
            </div>
            <!--Basic Details-->

            
        </div>
    </div>

    <!--End Shop Single Section-->
	
    <script src="{{ asset("/themes/js/jquery.js") }}"></script>
    <script src="{{ asset("/themes/js/jquery.fancybox.js") }}"></script>
    <script src="{{ asset("/themes/js/owl.js") }}"></script>
    <script src="{{ asset("/themes/js/script.js") }}"></script>
    
    @endsection