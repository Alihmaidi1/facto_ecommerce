<div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
    <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
        <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
            <span class="avatar avatar-md mb-3">
                @if (1)
                    <img src="{{ asset(Auth::user()) }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/avatar-place.png') }}';">
                @else
                    <img src="{{ asset('assets/img/avatar-place.png') }}" class="image rounded-circle" onerror="this.onerror=null;this.src='{{ asset('assets/img/avatar-place.png') }}';">
                @endif
            </span>
            <h4 class="h5 fs-16 mb-1 fw-600">dfs</h4>
            @if(1)
                <div class="text-truncate opacity-60">85438938</div>
            @else
                <div class="text-truncate opacity-60">sasj@gmail.com</div>
            @endif
        </div>

        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard'])}}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                @if(1)
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['completed-delivery'])}}">
                            <i class="las la-hourglass-half aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Assigned Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['completed-delivery'])}}">
                            <i class="las la-luggage-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Pickup Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['completed-delivery'])}}">
                            <i class="las la-running aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('On The Way Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['completed-delivery'])}}">
                            <i class="las la-check-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Completed Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['pending-delivery'])}}">
                            <i class="las la-clock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Pending Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['cancelled-delivery'])}}">
                            <i class="las la-times-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Cancelled Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['cancel-request-list'])}}">
                            <i class="las la-times-circle aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Request Cancelled Delivery') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['today-collection'])}}">
                            <i class="las la-comment-dollar aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Total Collections') }}
                            </span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['total-earnings'])}}">
                            <i class="las la-comment-dollar aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">
                                {{ __('Total Earnings') }}
                            </span>
                        </a>
                    </li>
                @else
{{--
                    @php
                        $delivery_viewed = App\Models\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                        $payment_status_viewed = App\Models\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                    @endphp  --}}
                    @if(1)
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['purchase_history.index','purchase_history.details'])}}">
                                <i class="las la-file-alt aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Purchase History') }}</span>
                                @if(1)<span class="badge badge-inline badge-success">{{ __('New') }}</span>@endif
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['digital_purchase_history.index'])}}">
                                <i class="las la-download aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Downloads') }}</span>
                            </a>
                        </li>
                    @endif

                        @if (1)
                            <li class="aiz-side-nav-item">
                                <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['customer_refund_request'])}}">
                                    <i class="las la-backward aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">{{ __('Sent Refund Request') }}</span>
                                </a>
                            </li>
                        @endif

                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                                <i class="la la-heart-o aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Wishlist') }}</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['compare'])}}">
                                <i class="la la-refresh aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Compare') }}</span>
                            </a>
                        </li>

                    @if(1)
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['customer_products.index', 'customer_products.create', 'customer_products.edit'])}}">
                                <i class="lab la-sketch aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Classified Products') }}</span>
                            </a>
                        </li>
                    @endif

                    @if (1)
                        {{--  @php
                            $conversation = \App\Models\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', 0)->get();
                        @endphp  --}}
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['conversations.index', 'conversations.show'])}}">
                                <i class="las la-comment aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Conversations') }}</span>
                                @if (1)
                                    <span class="badge badge-success">34</span>
                                @endif
                            </a>
                        </li>
                    @endif


                    @if (1)
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['wallet.index'])}}">
                                <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('My Wallet')}}</span>
                            </a>
                        </li>
                    @endif

                    @if (1)
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['earnng_point_for_user'])}}">
                                <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Earning Points')}}</span>
                            </a>
                        </li>
                    @endif

                    @if (1)
                        <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link {{ areActiveRoutes(['affiliate.user.index', 'affiliate.payment_settings'])}}">
                                <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ __('Affiliate') }}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ __('Affiliate System') }}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ __('Payment History') }}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ __('Withdraw request history') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
{{--
                    @php
                        $support_ticket = DB::table('tickets')
                                    ->where('client_viewed', 0)
                                    ->where('user_id', Auth::user()->id)
                                    ->count();
                    @endphp  --}}

                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['support_ticket.index'])}}">
                            <i class="las la-atom aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{__('Support Ticket')}}</span>
                            {{--  @if($support_ticket > 0)<span class="badge badge-inline badge-success">{{ $support_ticket }}</span> @endif  --}}
                        </a>
                    </li>
                @endif
                <li class="aiz-side-nav-item">
                    <a href="" class="aiz-side-nav-link {{ areActiveRoutes(['profile'])}}">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{__('Manage Profile')}}</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
        <a class="btn btn-sm p-2 d-flex align-items-center" href="">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span>{{ __('Logout') }}</span>
        </a>
        <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
</div>
