@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{__('Category Information')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('copon.store')}}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>

                            @error('name')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Code')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{__('Code')}}" id="name" name="code" class="form-control" required>


                            @error('code')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Type')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="type" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">

                                <option value="precent">precent</option>
                                <option value="flat">flat</option>

                            </select>



                            @error('type')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Value')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{__('Value')}}" id="name" name="value" class="form-control" required>


                            @error('value')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="start_date">{{__('Offer Start At')}}</label>
                        <div class="col-sm-9">

                            <input type="date" class="form-control" name="date_start_at"/>

                            @error('date_start_at')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="start_date">{{__('Offer End At')}}</label>
                        <div class="col-sm-9">

                            <input type="date" class="form-control" name="date_end_at"/>

                            @error('date_end_at')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Logo')}} <small>({{ __('200x200') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div onclick="clickfile()" class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                                </div>
                                <div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input id="file" type="file"  name="logo" class="selected-files d-none">
                            </div>
                            <div class="file-preview box sm">
                            </div>

                            @error('logo')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row ">
                        <label class="col-sm-3 control-label" for="start_date">{{__('Product Have This Copon')}}</label>

                        <div class="col-sm-9">
                            <select name="products[]"   class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ __('Choose Attributes') }}">
                                @foreach ($products as $key => $product)
                                <option  value="{{ $product->id }}" data-content="<span><span>{{ $product->name }}</span></span>"></option>
                                @endforeach
                            </select>
                        </div>

                    </div>



                    <div class="form-group row ">
                        <label class="col-sm-3 control-label" for="start_date">{{__('Category Have This Copon')}}</label>

                        <div class="col-sm-9">
                            <select name="categorys[]"   class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ __('Choose Attributes') }}">
                                @foreach ($categorys as $key => $category)
                                <option  value="{{ $category->id }}" data-content="<span><span>{{ $category->name }}</span></span>"></option>
                                @endforeach
                            </select>
                        </div>

                    </div>




                    <div class="form-group row ">
                        <label class="col-sm-3 control-label" for="start_date">{{__('Brands Have This Copon')}}</label>

                        <div class="col-sm-9">
                            <select name="brands[]"  class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ __('Choose Attributes') }}">
                                @foreach ($brands as $key => $brand)
                                <option  value="{{ $brand->id }}" data-content="<span><span>{{ $brand->name }}</span></span>"></option>
                                @endforeach
                            </select>
                        </div>

                    </div>






                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
function clickfile(){

    let file=document.getElementById('file');
    file.click();
}
</script>

@endsection
