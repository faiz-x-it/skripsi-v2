@extends('layouts.master')

@section('title')
Bookshop - Book details
@endsection
<link href="{{ asset("/themes/css/bootstrap.css") }}" rel="stylesheet">
<link href="{{ asset("/themes/css/style.css") }}" rel="stylesheet">
<link href="{{ asset("/themes/css/responsive.css") }}" rel="stylesheet">


@section('content')



<section class="shop-single-section">
    <div class="auto-container">
        <!--Shop Single-->
        <div class="shop-page product-details">
            <!--Basic Details-->
            <div class="basic-details">
                <div class="row clearfix">
                    <div
                        class="image-column col-lg-7 col-md-12 col-sm-12">
                        <div class="carousel-outer">
                            <ul
                                class="image-carousel owl-carousel owl-theme"
                            >
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                                <li>
                                    <a
                                        href="{{ App\Product::findOrFail(1)->image_url }}"
                                        class="lightbox-image"
                                        title="Image Caption Here"
                                        ><img
                                            src="{{ App\Product::findOrFail(1)->image_url }}"
                                            alt=""
                                    /></a>
                                </li>
                            </ul>

                            <ul
                                class="thumbs-carousel owl-carousel owl-theme"
                            >
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/14.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/15.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/16.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/17.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/14.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/15.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/16.jpg") }}"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="{{ asset("/images/resource/products/17.jpg") }}"
                                        alt=""
                                    />
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Info Column-->
                    <div
                        class="info-column col-lg-5 col-md-12 col-sm-12"
                    >
                        <div class="details-header">
                            <h2>Lizion</h2>
                            <div class="rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="item-price">
                                Price: $45.00
                            </div>
                        </div>

                        <div class="text">
                            <p>
                                Asininely angelic less lighted
                                bought we flung reindeer however
                                irrespective solemny as listlessly
                                thus famous. Mauris turpis nisi,
                                egestas non enim at gravida rutrum
                                mauris.
                            </p>
                        </div>

                        <div class="other-options">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="item-quantity">
                                        <input
                                            class="quantity-spinner"
                                            type="text"
                                            value="2"
                                            name="quantity"
                                        />
                                    </div>
                                </div>
                                <div class="pull-left">
                                    <!--Btns Box-->
                                    <div class="btns-box">
                                        <button
                                            type="button"
                                            class="theme-btn btn-style-three"
                                        >
                                            <span class="txt"
                                                >Add To Cart</span
                                            >
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="shop-list">
                            <li>
                                <strong>SKU</strong
                                ><span class="theme_color">.</span
                                >25087900
                            </li>
                            <li>
                                <strong>Category</strong
                                ><span class="theme_color">.</span
                                >Branding, Web Design
                            </li>
                            <li>
                                <strong>share</strong
                                ><span class="theme_color">.</span>
                            </li>
                            <li>
                                <a href="{{ url("#") }}">Add to Wishlist .</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Basic Details-->

            <!--Product Info Tabs-->
            <div class="product-info-tabs">
                <!--Product Tabs-->
                <div class="prod-tabs tabs-box">
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        <li
                            data-tab="#prod-details"
                            class="tab-btn active-btn"
                        >
                            Description
                        </li>
                        <li data-tab="#prod-info" class="tab-btn">
                            Additional Information
                        </li>
                        <li
                            data-tab="#prod-reviews"
                            class="tab-btn"
                        >
                            Reviews (2)
                        </li>
                    </ul>

                    <!--Tabs Container-->
                    <div class="tabs-content">
                        <!--Tab / Active Tab-->
                        <div
                            class="tab active-tab"
                            id="prod-details"
                        >
                            <div class="content">
                                <p>
                                    Lopsidedly wow fastidious before
                                    rhinoceros gosh from more
                                    unobtrusive since this unlike
                                    falsely far mundanely
                                    lethargically camel groomed save
                                    antelop thus inconspicuously
                                    since jay that for ouch far a
                                    one dog save gosh more ouch
                                    wherever that depending darn
                                    much daintily wiped hello jeez
                                    thus adversely man of war that
                                    unicorn thanks richly mannish
                                    less save like and dog from bore
                                    extensive. Supreme alas hellish
                                    circa.
                                </p>
                                <p>
                                    Inside this beyond into bit on
                                    capable through jeez yet
                                    tolerably plain and shark
                                    stealthy more breezily because
                                    ground passably gecko pending
                                    far up erroneor yikes lantern
                                    whimsically mowed one come
                                    admonishing amidst floated
                                    fortuitous crud far the the
                                    staunchly.
                                </p>
                            </div>
                        </div>

                        <!--Tab / Active Tab-->
                        <div class="tab" id="prod-info">
                            <div class="content">
                                <p>
                                    Lopsidedly wow fastidious before
                                    rhinoceros gosh from more
                                    unobtrusive since this unlike
                                    falsely far mundanely
                                    lethargically camel groomed save
                                    antelop thus inconspicuously
                                    since jay that for ouch far a
                                    one dog save gosh more ouch
                                    wherever that depending darn
                                    much daintily wiped hello jeez
                                    thus adversely man of war that
                                    unicorn thanks richly mannish
                                    less save like and dog from bore
                                    extensive. Supreme alas hellish.
                                </p>
                            </div>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="prod-reviews">
                            <!--Reviews Container-->
                            <div class="reviews-container">
                                <!--Review-->
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb">
                                        <img
                                            src="{{ asset("/images/resource/author-1.jpg") }}"
                                            alt=""
                                        />
                                    </figure>
                                    <div class="rev-content">
                                        <div
                                            class="rev-header clearfix"
                                        >
                                            <h4>Michel Britney</h4>
                                            <div class="rating">
                                                <span
                                                    class="fa fa-star"
                                                ></span>
                                                <span
                                                    class="fa fa-star"
                                                ></span>
                                                <span
                                                    class="fa fa-star"
                                                ></span>
                                                <span
                                                    class="fa fa-star-o"
                                                ></span>
                                                <span
                                                    class="fa fa-star-o"
                                                ></span>
                                            </div>
                                            <div class="time">
                                                18 Hours Ago
                                            </div>
                                        </div>
                                        <div class="rev-text">
                                            The mad lightning no one
                                            you beat of just one
                                            drum they call him
                                            Flipper Flipper faster
                                            than lightning no one
                                            you see is smarter each
                                            week my friends you are
                                            sure to get a smile from
                                            seven stranded cast
                                            aways here on Gilligans
                                            Isle they call him
                                            Flipper Flipper faster.
                                        </div>
                                    </div>
                                </div>

                                <!--Review-->
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb">
                                        <img
                                            src="{{ asset("/images/resource/author-2.jpg") }}"
                                            alt=""
                                        />
                                    </figure>
                                    <div class="rev-content">
                                        <div
                                            class="rev-header clearfix"
                                        >
                                            <h4>Denny</h4>
                                            <div class="rating">
                                                <span
                                                    class="fa fa-star"
                                                ></span>
                                                <span
                                                    class="fa fa-star"
                                                ></span>
                                                <span
                                                    class="fa fa-star"
                                                ></span>
                                                <span
                                                    class="fa fa-star-o"
                                                ></span>
                                                <span
                                                    class="fa fa-star-o"
                                                ></span>
                                            </div>
                                            <div class="time">
                                                18 Hours Ago
                                            </div>
                                        </div>
                                        <div class="rev-text">
                                            The mad lightning no one
                                            you beat of just one
                                            drum they call him
                                            Flipper Flipper faster
                                            than lightning no one
                                            you see is smarter each
                                            week my friends you are
                                            sure to get a smile from
                                            seven stranded cast
                                            aways here on Gilligans
                                            Isle they call him
                                            Flipper Flipper faster
                                            than lightning no one
                                            you see is smarter than
                                            he loveable space that
                                            needs your face threes
                                            company too.
                                        </div>
                                    </div>
                                </div>

                                <!--Add Review-->
                                <div class="add-review">
                                    <h2>Add a Review</h2>

                                    <form
                                        method="post"
                                        action="https://expert-themes.com/html/globex/shop-single.html"
                                    >
                                        <div class="row clearfix">
                                            <div
                                                class="form-group col-md-6 col-sm-12 col-xs-12"
                                            >
                                                <label
                                                    >Name *</label
                                                >
                                                <input
                                                    type="text"
                                                    name="name"
                                                    value=""
                                                    placeholder=""
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="form-group col-md-6 col-sm-12 col-xs-12"
                                            >
                                                <label
                                                    >Email *</label
                                                >
                                                <input
                                                    type="email"
                                                    name="email"
                                                    value=""
                                                    placeholder=""
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="form-group col-md-6 col-sm-12 col-xs-12"
                                            >
                                                <label
                                                    >Website
                                                    *</label
                                                >
                                                <input
                                                    type="text"
                                                    name="website"
                                                    value=""
                                                    placeholder=""
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="form-group col-md-6 col-sm-12 col-xs-12"
                                            >
                                                <label
                                                    >Rating
                                                </label>
                                                <div class="rating">
                                                    <a
                                                        href="{{ url("#") }}"
                                                        class="rate-box"
                                                        title="1 Out of 5"
                                                        ><span
                                                            class="fa fa-star"
                                                        ></span
                                                    ></a>
                                                    <a
                                                        href="{{ url("#") }}"
                                                        class="rate-box"
                                                        title="2 Out of 5"
                                                        ><span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span
                                                    ></a>
                                                    <a
                                                        href="{{ url("#") }}"
                                                        class="rate-box"
                                                        title="3 Out of 5"
                                                        ><span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        >
                                                        </span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span
                                                    ></a>
                                                    <a
                                                        href="{{ url("#") }}"
                                                        class="rate-box"
                                                        title="4 Out of 5"
                                                        ><span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span
                                                    ></a>
                                                    <a
                                                        href="{{ url("#") }}"
                                                        class="rate-box"
                                                        title="5 Out of 5"
                                                        ><span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span>
                                                        <span
                                                            class="fa fa-star"
                                                        ></span
                                                    ></a>
                                                </div>
                                            </div>
                                            <div
                                                class="form-group col-md-12 col-sm-12 col-xs-12"
                                            >
                                                <label
                                                    >Your
                                                    Review</label
                                                >
                                                <textarea
                                                    name="review-message"
                                                ></textarea>
                                            </div>
                                            <div
                                                class="form-group text-right col-md-12 col-sm-12 col-xs-12"
                                            >
                                                <button
                                                    type="button"
                                                    class="theme-btn btn-style-three"
                                                >
                                                    <span
                                                        class="txt"
                                                        >Add
                                                        Review</span
                                                    >
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End Tab-->
                    </div>
                </div>
            </div>
            <!--End Product Info Tabs-->
        </div>
    </div>
</section>

    <!--End Shop Single Section-->
	
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

    @endsection