@extends('admin.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{__('Add New Product')}}</h5>
</div>
<div class="">
    <form class="form form-horizontal mar-top" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Product Information')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Product Name')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" placeholder="{{ __('Product Name') }}" onchange="update_sku()" required>


                            @error('name')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">{{__('Category')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" required name="category_id" id="category_id" data-live-search="true" required>
                                    @foreach ($categorys as $category)

                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            @error('category_id')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">{{__('Brand')}}</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" required name="brand_id" id="brand_id" data-live-search="true">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>

                            @error('brand_id')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Minimum Purchase Qty')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" lang="en" required class="form-control" name="minimum_quantity" value="1" min="1" required>

                                @error('minimum_quantity')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Tags')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" required class="form-control aiz-tag-input" name="tags[]" placeholder="{{ __('Type and hit enter to add a tag') }}">

                                @error('tags')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror



                                <small class="text-muted">{{__('This is used for search. Input those words by which cutomer can find this product.')}}</small>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Product Images')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Gallery Images')}} <small>(600x600)</small></label>
                            <div class="col-md-8">
                                <div onclick="clickfile1()" class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                    <input id="file1" type="file" name="gallery[]" class="d-none" multiple/>
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">{{__('These images are visible in product details page gallery. Use 600x600 sizes images.')}}</small>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Thumbnail Image')}} <small>(300x300)</small></label>
                            <div class="col-md-8">
                                <div onclick="clickfile()" class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>

                                </div>
                                <input type="file" class="d-none" id="file" name="thumbnail"/>
                                <div class="file-preview box sm">
                                </div>
                                @error('thumbnail')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror

                                <small class="text-muted">{{__('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Product Videos')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Video Link')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="video_link" placeholder="{{ __('Video Link') }}">
                                <small class="text-muted">{{__("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Product Variation')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row gutters-5">
                            <div class="col-md-3">
                                <input type="text" class="form-control"  value="{{__('Colors')}}" disabled>
                            </div>
                            <div class="col-md-8">
                                <select name="colors[]" required  class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ __('Choose Attributes') }}">
                                    @foreach ($colors as $key => $color)
                                    <option  value="{{ $color->id }}" data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>"></option>
                                    @endforeach
                                </select>

                                @error('colors')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row gutters-5">
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="{{__('Attributes')}}" disabled>
                            </div>
                            <div class="col-md-8">
                                <select name="choice_attributes[]" id="choice_attributes" class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ __('Choose Attributes') }}">
                                    @foreach ($propertys as $key => $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <p>{{ __('Choose the attributes of this product and then input values of each attribute') }}</p>
                            <br>
                        </div>

                        <div class="customer_choice_options" id="customer_choice_options">

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Product price + stock')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Currency')}} <span class="text-danger">*</span></label>
                            <div class="col-md-6">

                                <select class="form-control aiz-selectpicker" required name="curenncy_id" id="brand_id" data-live-search="true">
                                    @foreach ($currencys as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                    @endforeach
                                </select>


                                @error('curenncy_id')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Unit price')}} <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="number" lang="en" required min="0" value="0" step="0.01" placeholder="{{ __('Unit price') }}" name="unit_price" class="form-control" required>

                                @error('unit_price')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div id="show-hide-div">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{__('Quantity')}} <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" required lang="en" min="0" value="0" step="1" placeholder="{{ __('Quantity') }}" name="quantity" class="form-control" required>

                                    @error('quantity')
                                        <span style="color:red;font-size:11px">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="sku_combination" id="sku_combination">

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Product Description')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Description')}}</label>
                            <div class="col-md-8">
                                <textarea required class="aiz-text-editor" name="description"></textarea>


                                @error('description')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror


                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('SEO Meta Tags')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Meta Title')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required name="meta_title" placeholder="{{ __('Meta Title') }}">

                                @error('meta_title')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{__('Description')}}</label>
                            <div class="col-md-8">
                                <textarea name="meta_description" required rows="8" class="form-control"></textarea>

                                @error('meta_description')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ __('Meta Image') }}</label>
                            <div class="col-md-8">
                                <div onclick="clickfile3()" class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ __('Choose File') }}</div>
                                </div>
                                <input type="file" name="meta_logo" id="file3" class="d-none"/>
                                <div class="file-preview box sm">
                                </div>

                                @error('meta_logo')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{__('Shipping Configuration')}}
                        </h5>
                    </div>

                    <div class="card-body">



                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{__('Free Shipping')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input  type="checkbox" name="free_shipping" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Low Stock Quantity Warning')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{__('Quantity')}}
                            </label>
                            <input required type="number" name="low_stock_quantity" value="1" min="0" step="1" class="form-control">


                            @error('low_stock_quantity')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                </div>






                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('Delivery Time')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{__('Delivery Time In Day')}}
                            </label>
                            <div class="input-group">
                                <input required type="number" class="form-control" name="est_shipping_days" min="1" step="1" placeholder="{{__('Shipping Days')}}">



                            @error('est_shipping_days')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">{{__('Days')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{__('VAT & Tax')}}</h5>
                    </div>
                    <div class="card-body">
                        <label for="name">
                            {{__("Tax")}}
                        </label>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input required type="number"  min="0" value="0" step="0.01" placeholder="{{ __('Tax') }}" name="tax" class="form-control" required>

                                @error('tax')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror


                            </div>
                            <div class="form-group col-md-6">
                                <select required class="form-control aiz-selectpicker" name="tax_type">
                                    <option value="amount">{{__('Flat')}}</option>
                                    <option value="percent">{{__('Percent')}}</option>
                                </select>
                                @error('tax_type')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <button type="submit" name="button" value="unpublish" class="btn btn-primary action-btn">{{ __('Save & Unpublish') }}</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success action-btn">{{ __('Save & Publish') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $('form').bind('submit', function (e) {
		if ( $(".action-btn").attr('attempted') == 'true' ) {
			//stop submitting the form because we have already clicked submit.
			e.preventDefault();
		}
		else {
			$(".action-btn").attr("attempted", 'true');
		}
        // Disable the submit button while evaluating if the form should be submitted
        // $("button[type='submit']").prop('disabled', true);

        // var valid = true;

        // if (!valid) {
            // e.preventDefault();

            ////Reactivate the button if the form was not submitted
            // $("button[type='submit']").button.prop('disabled', false);
        // }
    });

    $("[name=shipping_type]").on("change", function (){
        $(".flat_rate_shipping_div").hide();

        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });

    function add_more_customer_choice_option(i, name){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:"{{route('product.get_attribute')}}",
            data:{
               attribute_id: i
            },
            success: function(data) {
                var obj = JSON.parse(data);
                $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ __('Choice Title') }}" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_'+ i +'[]" multiple>\
                            '+obj+'\
                        </select>\
                    </div>\
                </div>');
                AIZ.plugins.bootstrapSelect('refresh');
           }
       });


    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')) {
            $('#colors').prop('disabled', true);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        else {
            $('#colors').prop('disabled', false);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $(document).on("change", ".attribute_choice",function() {
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group row').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'',
           data:$('#choice_form').serialize(),
           success: function(data) {
                $('#sku_combination').html(data);
                AIZ.uploader.previewGenerate();
                AIZ.plugins.fooTable();
                if (data.length > 1) {
                   $('#show-hide-div').hide();
                }
                else {
                    $('#show-hide-div').show();
                }
           }
       });
    }

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });

        update_sku();
    });

</script>


<script>


    function clickfile1(){


        let file1=document.getElementById("file1")
        file1.click()


    }


    function clickfile(){

        let file=document.getElementById("file")
        file.click()


    }

    function clickfile3(){

        let file=document.getElementById("file3")
        file.click()


    }
</script>


@endsection


