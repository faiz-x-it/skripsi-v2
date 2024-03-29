@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="payment-area">
            <h4 class="my-4 bg-dark p-3 text-white">Make your payment</h4>

            <div class="cart-summary my-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Order summary</h4>
                    </div>
                    <div class="card-body">
                        <p>Total products = {{Cart::content()->count()}}</p>
                        <p>Product Cost = &#8369;{{Cart::total()}}</p>
                        <p>Shipping cost = &#8369;0.00</p>
                        <p><strong>Total cost = &#8369;{{Cart::total()}}</strong></p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-3 my-4">
                <form action="{{route('cart.checkout')}}" method="post">
                    @csrf
                    <input type="hidden" name="cart_total" value="{{Cart::total()}}">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_7xVvmxzKaoeFzuBZZ18WdwKy00bmfx80CA"
                            data-amount=""
                            data-name="Bookshop"
                            data-description="Bookshop payment"
                            data-locale="auto">
                    </script>
                </form>
            </div>

            <form action="{{route('cart.checkout')}}" method="post">
                @csrf
                {{-- <input type="hidden" name="cart_total" value="{{Cart::total()}}"> --}}
                <input type="submit" value="Cash on Delivery" class="btn btn-primary btn-sm">
            </form>
   
            <div class="bg-light p-3 my-4">
                <button class="btn btn-success btn-sm"><strong>Cash on delivery</strong></button>
            </div>
        </div>
    </div>
@endsection
