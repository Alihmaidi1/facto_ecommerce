@extends('front.layouts.app')

@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ __('Flash Deals')}}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="">
                            {{ __('Home')}}
                        </a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="">
                            "{{ __('Flash Deals') }}"
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="mb-4">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 gutters-10">
            @foreach($copons as $single)
            <div class="col">
                <div class="bg-white rounded shadow-sm mb-3">
                    <a href="{{route('user.single_flash',$single->id)}}" class="d-block text-reset">
                        <img
                            src="{{ asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ asset('uploads/copons/'.$single->logo) }}"
                            alt=""
                            class="img-fluid lazyload rounded w-100">
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
