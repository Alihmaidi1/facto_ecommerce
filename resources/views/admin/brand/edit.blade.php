@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{__('Brand Information')}}</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            <ul class="nav nav-tabs nav-fill border-light">
  			</ul>
            <form class="p-4" action="{{route('brand.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$brand->id}}"/>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">{{__('Name')}} <i class="las la-language text-danger" title="{{__('Translatable')}}"></i></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{__('Name')}}" id="name" name="name" value="{{ $brand->name}}" class="form-control" required>


                        @error('name')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Logo')}} <small>({{ __('120x80') }})</small></label>
                    <div class="col-md-9">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div onclick="clickfile()" class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                            </div>
                            <div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input id="file" type="file" name="logo" value="{{$brand->logo}}" class="selected-files d-none">
                        </div>
                        <div class="file-preview box sm">
                        </div>

                        @error('logo')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label">{{__('Meta Description')}}</label>
                    <div class="col-sm-9">
                        <textarea name="description" rows="8" class="form-control">{{ $brand->description }}</textarea>

                        @error('description')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>

    function clickfile(){

        let file=document.getElementById("file");
        file.click()

    }
</script>


@endsection
