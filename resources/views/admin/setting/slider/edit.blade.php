@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{__('Slider Information')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('slider.update')}}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <input type="hidden" name="id" value="{{$slider->id}}"/>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" value="{{$slider->name}}" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>

                            @error('name')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('url')}}
                        </label>
                        <div class="col-md-9">

                            <input type="text" value="{{$slider->url}}" placeholder="{{__('Url')}}" id="name" name="url" class="form-control" required>


                            @error('url')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Status')}}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="status">

                                <option @if($slider->status==0) selected @endif value="0">No</option>
                                <option @if($slider->status==1) selected @endif value="1">Yes</option>

                            </select>

                            @error('status')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Rank')}}
                        </label>
                        <div class="col-md-9">
                            <input type="number" value="{{$slider->rank}}" name="rank" class="form-control" id="order_level" placeholder="{{__('Rank')}}">

                            @error('rank')
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



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Description')}}
                        </label>
                        <div class="col-md-9">

                            <textarea name="description" rows="5" class="form-control">{{$slider->description}}</textarea>

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
