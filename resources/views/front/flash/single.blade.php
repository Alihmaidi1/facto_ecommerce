@extends('front.layouts.app')

@section('content')

    @if(strtotime(date('Y-m-d')) <= $copon->date_end_at)
    <div>
        <section class="text-center mb-5">
            <img
                src="{{ asset('assets/img/placeholder-rect.jpg') }}"
                data-src="{{ asset('uploads/copons/'.$copon->logo) }}"
                alt="{{ $copon->title }}"
                class="img-fit w-100 lazyload"
            >
        </section>
        <section class="mb-4">
            <div class="container">
                <div class="text-center my-4 text-{{ $copon->text_color }}">
                    <h1 class="h2 fw-600">{{ $copon->name }}</h1>
                    <div class="aiz-count-down aiz-count-down-lg ml-3 align-items-center justify-content-center" data-date="{{ date('Y/m/d H:i:s', 43343) }}"></div>
                </div>
                <div class="row gutters-5 row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    @foreach ($copon->products as $key => $product)

                        @if (isset($product))
                            <div class="col mb-2">
                                @include('front.partials.product_box_1',['product' => $product])
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    @else
        <div style="background-color:{{ $copon->background_color }}">
            <section class="text-center">
                <img src="{{ asset($copon->banner) }}" alt="{{ $copon->title }}" class="img-fit w-100">
            </section>
            <section class="pb-4">
                <div class="container">
                    <div class="text-center text-{{ $copon->text_color }}">
                        <h1 class="h3 my-4">{{ $copon->title }}</h1>
                        <p class="h4">{{  __('This offer has been expired.') }}</p>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection
