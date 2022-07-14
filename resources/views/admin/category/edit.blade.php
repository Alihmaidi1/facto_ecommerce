@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{__('Category Information')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <input type="hidden" name="id" value="{{$category->id}}"/>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" value="{{$category->name}}" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>
                            @error('name')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Parent Category')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">{{ __('No Parent') }}</option>
                                @foreach ($categories as $category1)
                                    <option @if($category->id==$category1->id) selected @endif value="{{ $category1->id }}">{{ $category1->name }}</option>
                                @endforeach
                            </select>
                            @error('parent')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('status')}}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="status">

                                <option @if($category->status==0) selected @endif value="0">No</option>
                                <option @if($category->status==1) selected @endif value="1">Yes</option>

                            </select>

                            @error('status')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Show In Header')}}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="show_in_header">

                                <option @if($category->show_in_header==0) selected @endif value="0">No</option>
                                <option @if($category->show_in_header==1) selected @endif value="1">Yes</option>

                            </select>


                            @error('show_in_header')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Show In Main')}}
                        </label>
                        <div class="col-md-9">

                            <select class="select2 form-control aiz-selectpicker" name="show_in_main">

                                <option @if($category->show_in_main==0) selected @endif value="0">No</option>
                                <option @if($category->show_in_main==0) selected @endif value="1">Yes</option>
                            </select>


                            @error('show_in_main')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Rank')}}
                        </label>
                        <div class="col-md-9">
                            <input value="{{$category->rank}}" type="number" name="rank" class="form-control" id="order_level" placeholder="{{__('Rank')}}">

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
