<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                    <img class="mw-100" src="" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                    <img class="mw-100" src="{{ asset('assets/img/logo.png') }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ __('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{__('Dashboard')}}</span>
                    </a>
                </li>










                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Category')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('show_category')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_category', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Category')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('add_category')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add Category')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>





                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Products')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">

                                <li class="aiz-side-nav-item">
                                    <a href="{{route('product.create')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_category', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__(' Add New Product')}}</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="{{route('product.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_category', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__('Product')}}</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="{{route('copon.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_category', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show Copons')}}</span>
                                    </a>
                                </li>




                                <li class="aiz-side-nav-item">
                                    <a href="{{route('color.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_category', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__('Color')}}</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="{{route('property.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_category', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__('Property')}}</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
















                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Brands')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('show_brand')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_brand'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Brands')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>






                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Currency')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('show_currency')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show_currency', 'add_category'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Currency')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('currency.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add Currency')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>





                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Slider')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('slider.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['slider.show', 'slider.create'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Sliders')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('slider.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add Sliders')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>







                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Country')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('country.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['country.show', 'country.create'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Country')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('country.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add Country')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>









                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('City')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('city.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['city.show', 'city.create'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All City')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('city.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add City')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>






                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('News')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('news.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['news.show', 'new.create'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All News')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('new.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add New')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Banners')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('banner.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['banner.show', 'banner.create'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Banners')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('banner.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add Banner')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>





                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Seo')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('seo.show')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['seo.show', 'seo.create'])}}">
                                        <span class="aiz-side-nav-text">{{__('Show All Seo')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('seo.create')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Add Seo')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-tasks aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Website Setting')}}</span>
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-2">
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('show.header')}}" class="aiz-side-nav-link  {{ areActiveRoutes(['show.header', 'show.footer'])}}">
                                        <span class="aiz-side-nav-text">{{__('Header')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('show.footer')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('Footer')}}</span>
                                    </a>
                                </li>


                                <li class="aiz-side-nav-item">
                                    <a href="{{route('show.pages')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{__('pages')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>









                <!-- Product -->
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{__('Staffs')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="" class="aiz-side-nav-link ">
                                    <span class="aiz-side-nav-text">{{__('All staffs')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="" class="aiz-side-nav-link ">
                                    <span class="aiz-side-nav-text">{{__('Staff permissions')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{__('System')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{__('Update')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{__('Server status')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <!-- Addon Manager -->
                    <li class="aiz-side-nav-item">
                        <a href="" class="aiz-side-nav-link ">
                            <i class="las la-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{__('Addon Manager')}}</span>
                        </a>
                    </li>
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
