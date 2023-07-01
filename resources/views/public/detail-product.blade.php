<div class="prod-tabs tabs-box">
    <!--Tab Btns-->
    <ul class="tab-btns tab-buttons clearfix">
        <li data-tab="#prod-details" class="tab-btn">
            Description
        </li>
        <li data-tab="#prod-info" class="tab-btn active-btn">
            Additional Information
        </li>
        <li data-tab="#prod-reviews" class="tab-btn">
            Reviews
        </li>
    </ul>

    <!--Tabs Container-->
    <div class="tabs-content">
        <!--Tab / Active Tab-->
        <div class="tab" id="prod-details">
            <div class="row">
                    <div class="book-description p-3">
                        <p>{!! Markdown::convertToHtml(e($produk->description)) !!}</p>
                    </div>
                    <div class="large-6 medium-10 small-10 columns" id="product_info_sizetable"><div class="row medium-text" style="margin-top:15px;">
                        <div class="large-4 medium-4 small-4 columns"><strong>Ukuran</strong></div>
                        <div class="large-4 medium-4 small-4 columns"><strong>Lebar</strong></div>
                        <div class="large-4 medium-4 small-4 columns end"><strong>Panjang</strong></div>
                        </div><div class="row medium-text store-detail-sizechart-entry" id="product_info_schart_38">
                        <div class="large-4 medium-4 small-4 columns">2</div>
                        <div class="large-4 medium-4 small-4 columns">30 cm </div>
                        <div class="large-4 medium-4 small-4 columns">42 cm </div>
                        </div><div class="row medium-text store-detail-sizechart-entry" id="product_info_schart_39">
                        <div class="large-4 medium-4 small-4 columns">3</div>
                        <div class="large-4 medium-4 small-4 columns">32 cm </div>
                        <div class="large-4 medium-4 small-4 columns">44 cm </div>
                        </div><div class="row medium-text store-detail-sizechart-entry" id="product_info_schart_40">
                        <div class="large-4 medium-4 small-4 columns">4</div>
                        <div class="large-4 medium-4 small-4 columns">35 cm </div>
                        <div class="large-4 medium-4 small-4 columns">47 cm </div>
                        </div><div class="row medium-text store-detail-sizechart-entry" id="product_info_schart_41">
                        <div class="large-4 medium-4 small-4 columns">5</div>
                        <div class="large-4 medium-4 small-4 columns">37 cm </div>
                        <div class="large-4 medium-4 small-4 columns">49 cm </div>
                        </div><div class="row medium-text store-detail-sizechart-entry" id="product_info_schart_42">
                        <div class="large-4 medium-4 small-4 columns">6</div>
                        <div class="large-4 medium-4 small-4 columns">39 cm </div>
                        <div class="large-4 medium-4 small-4 columns">51 cm </div>
                        </div></div>
                </div>
                
        </div>

        <!--Tab / Active Tab-->
        <div class="tab active-tab" id="prod-info">
            <div class="content">
                <div class="card my-4">
                    <div class="card-header bg-dark">
                        <h4 class="text-white">Produk Serupa</h4>
                    </div>
                    <div class="card-body">
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
            </div>
        </div>

        <!--Tab-->
        <div class="tab" id="prod-reviews">
            <!--Reviews Container-->
            @include('layouts.includes.reviews')
        </div>
        <!--End Tab-->
    </div>
</div>