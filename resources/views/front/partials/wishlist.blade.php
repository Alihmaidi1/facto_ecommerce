<a href="" class="d-flex align-items-center text-reset">
    <i class="la la-heart-o la-2x opacity-80"></i>
    <span class="flex-grow-1 ml-1">
        @if(Auth::check())
            <span style="background:rgb(231, 3, 3)" class="badge badge-primary badge-inline badge-pill">2</span>
        @else
            <span style="background:rgb(231, 3, 3)" class="badge badge-primary badge-inline badge-pill">0</span>
        @endif
        <span class="nav-box-text d-none d-xl-block opacity-70">{{__('Wishlist')}}</span>
    </span>
</a>
