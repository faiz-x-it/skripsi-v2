@extends('layouts.master')
@section('title')
    Getfast - all produk
@endsection
@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-area">
                        @if($term = request('term'))
                            <div class="alert alert-info my-3">
                                tampilkan hasil untuk <strong>{{$term}}</strong>
                            </div>
                        @endif
                        @if(! $produk->count())
                            <div class="alert alert-warning my-4">Tidak ada produk yang tersedia</div>
                        @else
                            <div class="card my-4">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">semua produk</h4>
                                </div>
                                @if(isset($categoryName))
                                    <div class="alert alert-info m-3">
                                        kategori <strong>{{$categoryName}}</strong>
                                    </div>
                                @endif
                                @if(isset($authorName))
                                    <div class="alert alert-info m-3">
                                        created by <strong>{{$authorName}}</strong>
                                    </div>
                                @endif
                                @if(isset($discountTitle))
                                    <div class="alert alert-info m-3">
                                        <strong>{{$discountTitle}}</strong>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($produk as $item)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('detail', $item->id)}}"><img src="{{$item->image_url}}" alt=""></a>
                                                        @if($item->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Discount {{$item->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('detail', $item->id)}}">{{str_limit($item->title, 25)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        {{-- <small>By <a href="{{route('author', $item->author->slug)}}">{{$item->author->name}}</a></small> --}}
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($item->discount_rate)
                                                            <span class="line-through mr-3">Rp. {{$item->init_price}}</span><br>
                                                        @endif
                                                        <span class=""><strong>Rp. {{$item->price}}</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="show-more pt-2 text-right">
                                        <nav class="text-center">
                                            {{$produk->appends(request()->only(['term']))->render()}}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Sidebar -->
                @include('layouts.includes.side-bar')
                <!-- Sidebar end -->
                </div>
        </div>
    </section>
@endsection
