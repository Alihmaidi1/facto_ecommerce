@if($flash_deal != null && date('Y-m-d') >= $flash_deal->date_start_at && date('Y-m-d') <= $flash_deal->date_end_at)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span  class="border-bottom  border-width-2 pb-3 d-inline-block">{{ __('Flash Sale') }}</span>
                    </h3>
                    <div class="aiz-count-down ml-auto ml-lg-3 align-items-center"  style="background:red;color:white" data-date="{{ date('Y/m/d H:i:s', strtotime($flash_deal->date_end_at)) }}"></div>
                    <a href="" style="background: rgb(240, 40, 40)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md  w-md-auto">{{ __('View More') }}</a>
                </div>

                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($flash_deal->products as $key => $product)

                        @if ($product != null)
                            <div class="carousel-box">
                                @include('front.partials.product_box_1',['product' => $product])
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
