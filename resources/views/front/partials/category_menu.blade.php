<div class="aiz-category-menu bg-white rounded ">
    <div class="p-3 bg-soft-primary d-none d-lg-block rounded-top all-category position-relative text-left">
        <span class="fw-600 fs-16 mr-3">{{ __('Categories') }}</span>
        <a href="{{route('user_show.category')}}" class="text-reset">
            <span class="d-none d-lg-inline-block">{{ __('See All') }} ></span>
        </a>
    </div>
    <ul class="list-unstyled categories no-scrollbar py-2 mb-0 text-left">
        @foreach (App\Models\category::where("show_in_header",1)->where("status",1)->where("parent",null)->get() as $key => $category)
            <li class="category-nav-element" data-id="{{ $category->id }}">
                <a  class="text-truncate text-reset py-2 px-3 d-block">
                    <img
                        class="cat-image lazyload mr-2 opacity-60"
                        src="{{ asset('uploads/category/'.$category->logo) }}"
                        width="16"
                        alt="{{ $category->name }}"
                        onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder.jpg') }}';"
                    >
                    <span class="cat-name">{{ $category->name }}</span>
                </a>

            </li>
        @endforeach
    </ul>
</div>
