
    @php
    if(Session::has("currency_code")){

        $currency_code=Session::get("currency_code");
        $currency_name=Session::get("currency_name");

    }else{

        $currency_code=App\Models\currency::where("is_default",1)->first()->code;
        $currency_name=App\Models\currency::where("is_default",1)->first()->name;

    }

    @endphp

@extends('front.layouts.app')

@section('content')
    {{-- Categories , Sliders . Today's deal --}}
    <div class="home-banner-area mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-lg-3 position-static d-none d-lg-block">
                    @include('front.partials.category_menu')
                </div>

                <div class="@if($product_today_hot!=null) col-lg-7 @else col-lg-9 @endif">
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                            @foreach ($sliders as $key => $value)
                                <div class="carousel-box">
                                    <a href="{{$value->url}}">
                                        <img
                                            class="d-block mw-100 img-fit rounded shadow-sm overflow-hidden"
                                            src="{{asset('uploads/settings/sliders/'.$value->logo)}}"
                                            alt="{{ env('APP_NAME')}} promo"

                                            @if($category_in_main->count() == 0)
                                            height="457"
                                            @else
                                            height="315"
                                            @endif
                                            onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @if (1)
                        <ul class="list-unstyled mb-0 row gutters-5">
                            @foreach ($category_in_main as $key => $category)
                                <li class="minw-0 col-4 col-md mt-3">
                                    <a href="{{route('user.single_category',$category->id)}}" style="cursor: pointer" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img
                                            src="{{ asset('uploads/category/'.$category->logo) }}"
                                            data-src="{{ asset('uploads/category/'.$category->logo) }}"
                                            alt="{{ $category->name }}"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">{{ $category->name }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                @if($product_today_hot!=null)

                <div  class="col-lg-2 order-3 mt-3 mt-lg-0">
                    <div class="bg-white rounded shadow-sm">
                        <div class="bg-soft-primary rounded-top p-3 d-flex align-items-center justify-content-center">
                            <span class="fw-600 fs-16 mr-2 text-truncate">
                                {{ __('Todays Deal') }}
                            </span>
                            <span style="background:rgb(245, 39, 2)" class="badge badge-primary  badge-inline">{{ __('Hot') }}</span>
                        </div>
                        <div style="background:rgb(235, 37, 2)" class="c-scrollbar-light overflow-auto h-lg-400px p-2  rounded-bottom">
                            <div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
                        @foreach ($product_today_hot->products as $key => $product)
                                @if ($product != null)
                                <div class="col mb-2">
                                    <a href="" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-80px"
                                                        src="{{ asset('uploads/products/thumbnail/'.$product->thumbnail) }}"
                                                        data-src="{{ asset('uploads/products/thumbnail/'.$product->thumbnail) }}"
                                                        alt="{{ $product->name }}"
                                                        onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">

                                                    @if($product_today_hot->type=="precent")
                                                    <span style="color: rgb(255, 51, 0)" class="d-block  fw-600">{{ $currency_code." ".($product->price-$product->price*$product_today_hot->value)}}</span>
                                                    @else
                                                    <span style="color: rgb(255, 51, 0)" class="d-block  fw-600">{{ $currency_code." ".($product->price-$product_today_hot->value)}}</span>

                                                    @endif


                                                    <del class="d-block opacity-70">{{$currency_code." ".convert_currency($product->price,$product->currency->value_in_dular,$currency_code)}}</del>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>


    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @foreach ($banner_in_header as $key => $banner)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{$banner->url}}" class="d-block text-reset">
                                <img style="height: 200px" src="{{asset('uploads/banners/'.$banner->logo)}}"  alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @foreach($flashs as $key => $flash_deal)
    @include('front.partials.flash',['flash_deal' => $flash_deal])

    @endforeach






    <div id="section_newest">
        <section class="mb-4">
            <div class="container">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3 align-items-baseline border-bottom">
                        <h3 class="h5 fw-700 mb-0">
                            <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">
                                {{ __('New Products') }}
                            </span>
                        </h3>

                    </div>
                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>

                        @foreach ($new_products as $key => $new_product)
                        <div class="carousel-box">
                            @include('front.partials.product_box_1',['product' => $new_product])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
</div>







           @if (count($best_selling_products) > 0)
               <section class="mb-4">
                   <div class="container">
                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ __('Best Selling') }}</span>
                                </h3>
                                <a href="" style="background: red" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ __('View More') }}</a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                            @foreach ($best_selling_products as $key => $new_product)
                            <div class="carousel-box">
                                @include('front.partials.product_box_1',['product' => $new_product])
                            </div>
                            @endforeach

                           </div>
                       </div>
                   </div>
               </section>
           @endif


           @foreach($category_in_main as $key => $category)

           <section class="mb-4">
            <div class="container">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                     <div class="d-flex mb-3 align-items-baseline border-bottom">
                         <h3 class="h5 fw-700 mb-0">
                             <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{$category->name}}</span>
                         </h3>
                         <a href="" style="background: red" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ __('View More') }}</a>
                     </div>
                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                     @foreach ($category->products as $key => $new_product)
                     <div class="carousel-box">
                         @include('front.partials.product_box_1',['product' => $new_product])
                     </div>
                     @endforeach

                    </div>
                </div>
            </div>
        </section>

           @endforeach


    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @foreach ($banner_in_footer as $key => $banner)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{$banner->url}}" class="d-block text-reset">
                                <img style="height: 200px" src="{{asset('uploads/banners/'.$banner->logo)}}"  alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Top 10 categories and Brands --}}
    @if (1)
    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @if (1)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ __('Top 10 Categories') }}</span>
                            </h3>
                            <a href="" style="background: rgb(226, 49, 36)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ __('View All Categories') }}</a>
                        </div>
                        <div class="row gutters-5">
                            @foreach ($top_category as $key => $category)
                                    <div class="col-sm-6">
                                        <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="{{ asset('uploads/category/'.$category->logo) }}"
                                                        alt="{{ $category->name }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->name }}</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (1)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ __('Top 10 Brands') }}</span>
                            </h3>
                            <a href="" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" style="background: rgb(226, 49, 36)">{{ __('View All Brands') }}</a>
                        </div>
                        <div class="row gutters-5">
                            @foreach ($brands as $key => $brand)
                                    <div class="col-sm-6">
                                        <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="{{ asset('uploads/brands/'.$brand->logo) }}"
                                                        alt="{{ $brand->name }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">{{ $brand->name }}</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('', {_token:'{{ csrf_token() }}'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
@endsection
