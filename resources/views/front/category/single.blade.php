@extends('front.layouts.app')

{{--  @section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection  --}}

@section('content')

    <section class="mb-4 pt-3">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6 mb-0 fw-600">{{ __('Filters') }}</h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" >
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>
                                <div class="bg-white shadow-sm rounded mb-3">
                                    <div class="fs-15 fw-600 p-3 border-bottom">
                                        {{ __('Categories')}}
                                    </div>
                                    <div class="p-3">
                                        <ul class="list-unstyled">
                                            @if (!isset($category_id))
                                                @foreach ($categorys as $category1)
                                                    <li class="mb-2 ml-2">
                                                        <a class="text-reset fs-14" href="{{route('user.single_category',$category1->id)}}">{{ $category1->name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="bg-white shadow-sm rounded mb-3">
                                    <div class="fs-15 fw-600 p-3 border-bottom">
                                        {{ __('Price range')}}
                                    </div>
                                    <div class="p-3">
                                        <div class="aiz-range-slider">
                                            <div
                                                id="input-slider-range"
                                                data-range-value-min="0"
                                                data-range-value-max="23"
                                            ></div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                                            data-range-value-low="0"
                                                        id="input-slider-range-value-low"
                                                    ></span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                                            data-range-value-high="23"
                                                        id="input-slider-range-value-high"
                                                    ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="bg-white shadow-sm rounded mb-3">
                                        <div class="fs-15 fw-600 p-3 border-bottom">
                                            {{ __('Filter by Color') }}
                                        </div>
                                        <div class="p-3">
                                            <div class="aiz-checkbox-list">
                                                {{--  @foreach ($attribute->attributes as $attribute)  --}}
                                @foreach ($colors as $color)
                                <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ $color->name }}">
                                    <input
                                        type="radio"
                                        name="color"
                                        value="{{ $color->code }}"
                                        onchange="filter()"
                                    >
                                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                        <span class="size-30px d-inline-block rounded" style="background: {{ $color->code }};"></span>
                                    </span>
                                </label>
                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div>


                    <div class="col-xl-9">

                        <ul class="breadcrumb bg-transparent p-0">
                            <li class="breadcrumb-item opacity-50">
                                <a class="text-reset" href="">{{ __('Home')}}</a>
                            </li>
                                <li class="breadcrumb-item fw-600  text-dark">
                                    <a class="text-reset" href="{{route('user_show.category')}}">"{{ __('All Categories')}}"</a>
                                </li>
                                <li class="breadcrumb-item opacity-50">
                                    <a class="text-reset" href="">{{ $category->name}}</a>
                                </li>

                        </ul>

                        <div class="text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="h6 fw-600 text-body">
                                            {{ $category->name }}

                                    </h1>
                                    <input type="hidden" name="keyword" value="">
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                        <label class="mb-0 opacity-50">{{ __('Brands')}}</label>
                                        <select class="form-control form-control-sm aiz-selectpicker" data-live-search="true" name="brand" onchange="filter()">
                                            <option value="">{{ __('All Brands')}}</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->url }}" >{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    <label class="mb-0 opacity-50">{{ __('Sort by')}}</label>
                                    <select class="form-control form-control-sm aiz-selectpicker" name="sort_by" onchange="filter()">
                                        <option value="newest">{{ __('Newest')}}</option>
                                        <option value="oldest">{{ __('Oldest')}}</option>
                                        <option value="price-asc">{{ __('Price low to high')}}</option>
                                        <option value="price-desc">{{ __('Price high to low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
                        <div class="row gutters-5 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2">
                            @foreach ($products=$category->products as $key => $product)
                                <div class="col">
                                    @include('front.partials.product_box_1',['product' => $product])
                                </div>
                            @endforeach
                        </div>
                        <div class="aiz-pagination aiz-pagination-center mt-4">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection
