<section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ __('Terms & conditions') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ __('Return Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ __('Support Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="">
                    <i class="las la-exclamation-circle la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ __('Privacy Policy') }}</h4>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark py-5 text-light footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4 text-center text-md-left">
                <div class="mt-4">
                    <a href="" class="d-block">
                        @if(App\Models\header::find(1)->app_logo != null)
                            <img style="width: 100%" class="lazyload" src="{{ asset('uploads/headers/'.App\Models\header::find(1)->app_logo) }}" data-src="{{ asset('uploads/headers/'.App\Models\header::find(1)->app_logo) }}" alt="{{ env('APP_NAME') }}" height="44">
                        @else
                            <img style="width:100%" class="lazyload" src="{{ asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                        @endif
                    </a>
                    <div class="my-3">
                        {{--  {!! get_setting('about_us_description',null,App::getLocale()) !!}  --}}
                    </div>
                    <div class="d-inline-block d-md-block mb-4">
                        <form class="form-inline" method="POST" action="">
                            @csrf
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="{{ __('Your Email Address') }}" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Subscribe') }}
                            </button>
                        </form>
                    </div>
                    <div class="w-300px mw-100 mx-auto mx-md-0">
                        @if(1)
                            <a href="{{App\Models\header::find(1)->app_url}}" target="_blank" class="d-inline-block mr-3 ml-0">
                                <img src="{{ asset('assets/img/play.png') }}" class="mx-100 h-40px">
                            </a>
                        @endif
                        @if(1)
                            <a href="{{App\Models\header::find(1)->app_url}}" target="_blank" class="d-inline-block">
                                <img src="{{ asset('assets/img/app.png') }}" class="mx-100 h-40px">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ml-xl-auto col-md-4 mr-0">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ __('Contact Info') }}
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                           <span class="d-block opacity-30">{{ __('Address') }}:</span>
                           <span class="d-block opacity-70">{{App\Models\footer::find(1)->address}}</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">{{__('Phone')}}:</span>
                           <span class="d-block opacity-70">{{App\Models\footer::find(1)->phone}}</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">{{__('Email')}}:</span>
                           <span class="d-block opacity-70">
                               <a href="mailto:{{App\Models\footer::find(1)->email}}" class="text-reset">{{ App\Models\footer::find(1)->email }}</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">

                        {{App\Models\footer::find(1)->navtitle}}

                    </h4>
                    <ul class="list-unstyled">
                        @if (1)
                            @foreach (App\Models\footernav::all() as $key => $value)
                            <li class="mb-2">
                                <a href="{{ $value->value }}" class="opacity-50 hov-opacity-100 text-reset">
                                    {{ $value->link }}
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        {{ __('My Account') }}
                    </h4>
                    <ul class="list-unstyled">
                        @if (auth('user')->user()!=null)
                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        @else
                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                    {{ __('Login') }}
                                </a>
                            </li>
                        @endif
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                {{ __('Order History') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                {{ __('My Wishlist') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                {{ __('Track Order') }}
                            </a>
                        </li>
                        @if (1)
                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-light" href="">{{ __('Be an affiliate partner')}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                @if (1)
                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            {{ __('Be a Seller') }}
                        </h4>
                        <a style="background: rgb(255, 17, 0)" href="{{App\Models\header::find(1)->app_url}}" class="btn btn-primary btn-sm shadow-md">
                            {{ __('Apply Now') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-center text-md-left" current-verison="{{get_setting("current_version")}}">

                    {{$footer->copy_right}}

                </div>
            </div>
            <div class="col-lg-4">
                @if (App\Models\footer::find(1)->social_media_status)
                <ul class="list-inline my-3 my-md-0 social colored text-center">
                    @if (1)
                    <li class="list-inline-item">
                        <a href="{{App\Models\footer::find(1)->facebook}}" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                    </li>
                    @endif
                    @if (1)
                    <li class="list-inline-item">
                        <a href="{{App\Models\footer::find(1)->twitter}}" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                    </li>
                    @endif
                    @if (1)
                    <li class="list-inline-item">
                        <a href="{{App\Models\footer::find(1)->instagram}}"  class="instagram"><i class="lab la-instagram"></i></a>
                    </li>
                    @endif
                    @if (1)
                    <li class="list-inline-item">
                        <a href="{{App\Models\footer::find(1)->youtube}}" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                    </li>
                    @endif
                    @if (1)
                    <li class="list-inline-item">
                        <a href="{{App\Models\footer::find(1)->linkedin}}" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                    </li>
                    @endif
                </ul>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-inline mb-0">
                        @if (1)
                                <li class="list-inline-item">
                                    <img src="{{asset('default/payment.png')}}" height="30" class="mw-100 h-auto" style="max-height: 30px">
                                </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="row align-items-center gutters-5">
        <div class="col">
            <a href="" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-home fs-20 opacity-60 {{ areActiveRoutes(['home'],'opacity-100 text-primary')}}"></i>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['home'],'opacity-100 fw-600')}}">{{ __('Home') }}</span>
            </a>
        </div>
        <div class="col">
            <a href="" class="text-reset d-block text-center pb-2 pt-3">
                <i class="las la-list-ul fs-20 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 text-primary')}}"></i>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['categories.all'],'opacity-100 fw-600')}}">{{ __('Categories') }}</span>
            </a>
        </div>
        {{--  @php
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $cart = \App\Models\Cart::where('user_id', $user_id)->get();
            } else {
                $temp_user_id = Session()->get('temp_user_id');
                if($temp_user_id) {
                    $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
                }
            }
        @endphp  --}}
        <div class="col-auto">
            <a href="" class="text-reset d-block text-center pb-2 pt-3">
                <span class="align-items-center bg-primary border border-white border-width-4 d-flex justify-content-center position-relative rounded-circle size-50px" style="margin-top: -33px;box-shadow: 0px -5px 10px rgb(0 0 0 / 15%);border-color: #fff !important;">
                    <i class="las la-shopping-bag la-2x text-white"></i>
                </span>
                <span class="d-block mt-1 fs-10 fw-600 opacity-60 {{ areActiveRoutes(['cart'],'opacity-100 fw-600')}}">
                    {{ __('Cart') }}

                    (<span class="cart-count">34</span>)
                </span>
            </a>
        </div>
        <div class="col">
            <a href="" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-inline-block position-relative px-2">
                    <i class="las la-bell fs-20 opacity-60 {{ areActiveRoutes(['all-notifications'],'opacity-100 text-primary')}}"></i>
                    @if(1)
                        <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 7px;top: -2px;"></span>
                    @endif
                </span>
                <span class="d-block fs-10 fw-600 opacity-60 {{ areActiveRoutes(['all-notifications'],'opacity-100 fw-600')}}">{{ __('Notifications') }}</span>
            </a>
        </div>
        <div class="col">
        @if (1)
            @if(1)
                <a href="" class="text-reset d-block text-center pb-2 pt-3">
                    <span class="d-block mx-auto">
                        @if(0)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}" class="rounded-circle size-20px">
                        @else
                            <img src="{{ asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                        @endif
                    </span>
                    <span class="d-block fs-10 fw-600 opacity-60">{{ __('Account') }}</span>
                </a>
            @else
                <a href="javascript:void(0)" class="text-reset d-block text-center pb-2 pt-3 mobile-side-nav-thumb" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                    <span class="d-block mx-auto">
                        @if(0)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}" class="rounded-circle size-20px">
                        @else
                            <img src="{{ asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                        @endif
                    </span>
                    <span class="d-block fs-10 fw-600 opacity-60">{{ __('Account') }}</span>
                </a>
            @endif
        @else
            <a href="" class="text-reset d-block text-center pb-2 pt-3">
                <span class="d-block mx-auto">
                    <img src="{{ asset('assets/img/avatar-place.png') }}" class="rounded-circle size-20px">
                </span>
                <span class="d-block fs-10 fw-600 opacity-60">{{ __('Account') }}</span>
            </a>
        @endif
        </div>
    </div>
</div>
@if (1)
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('front.inc.user_side_nav')
        </div>
    </div>
@endif
