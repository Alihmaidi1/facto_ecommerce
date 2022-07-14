<div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    @if($bool=App\Models\product_copon::where("product_id",$product->id)->get()->count()>0)
    <span class="badge-custom">{{ __('OFF') }}<span class="box ml-1 mr-0">&nbsp;34%</span></span>
    @endif
    <div class="position-relative">
        <a href="{{route('user.show_product',$product->id)}}" class="d-block">
            <img
                class="img-fit lazyload mx-auto h-140px h-md-210px"
                src="{{ asset('uploads/products/thumbnail/'.$product->thumbnail) }}"
                data-src="{{ asset('uploads/products/thumbnail/'.$product->thumbnail) }}"
                alt="{{  $product->name  }}"
                onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder.jpg') }}';"
            >
        </a>

        <div class="absolute-top-right aiz-p-hov-icon">
            <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ __('Add to wishlist') }}" data-placement="left">
                <i class="la la-heart-o"></i>
            </a>
            <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ __('Add to cart') }}" data-placement="left">
                <i class="las la-shopping-cart"></i>
            </a>
        </div>
    </div>
    <div class="p-md-3 p-2 text-left">
        <div class="fs-15">
            @if($bool)
                <del class="fw-600 opacity-50 mr-1">{{$product->currency->code." ".number_format((float)$product->price, 3, '.', '')}}</del>
            <span style="color: rgb(255, 51, 0)" class="fw-700">{{$product->currency->code." ".number_format((float)$product->price, 3, '.', '')}}</span>
            @else
            <span style="color: rgb(255, 51, 0)" class="fw-700">{{$product->currency->code." ".number_format((float)$product->price, 3, '.', '')}}</span>

            @endif
        </div>
        <div class="rating rating-sm mt-1">
            {{renderStarRating($product->rating)}}
        </div>
        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
            <a href="" class="d-block text-reset">{{  strip_tags($product->description)  }}</a>
        </h3>
            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                {{ __('Club Point') }}:
                <span class="fw-700 float-right">23</span>
            </div>
    </div>
</div>
