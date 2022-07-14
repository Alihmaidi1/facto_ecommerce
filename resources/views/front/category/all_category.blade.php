@extends('front.layouts.app')

@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ __('All Categories') }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="">{{ __('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="">"{{ __('All Categories') }}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
    <div class="container">
        @foreach ($categorys as $key => $category)
            <div class="mb-3 bg-white shadow-sm rounded">
                <div class="p-3 border-bottom fs-16 fw-600">
                    <a href="" class="text-reset">{{  $category->name }}</a>
                </div>
                <div class="p-3 p-lg-4">
                    <div class="row">
                        @foreach ($category->categorys as $key => $first_level)
                        <div class="col-lg-4 col-6 text-left">
                            <h6 class="mb-3"><a class="text-reset fw-600 fs-14" href="">{{ \App\Models\Category::find($first_level->id)->name }}</a></h6>
                            <ul class="mb-3 list-unstyled pl-2">
                                @foreach ($first_level->categorys as $key => $second_level)
                                <li class="mb-2">
                                    @include("front.category.sub_category",['second_level' => $second_level])
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
