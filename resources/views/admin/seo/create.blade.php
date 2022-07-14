@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{__('Seo Information')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('seo.store')}}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Url')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{__('Url')}}" id="name" name="url" class="form-control" required>


                            @error('url')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Title')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{__('Title')}}" id="name" name="title" class="form-control" required>

                            @error('title')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Facebook')}}</label>
                        <div class="col-md-9">
                            <input type="url" placeholder="{{__('Facebook')}}" id="name" name="facebook" class="form-control" required>


                            @error('facebook')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Twitter org')}}</label>
                        <div class="col-md-9">
                            <input type="url" placeholder="{{__('Twitter org')}}" id="name" name="twitter_org" class="form-control" >

                            @error('twitter_org')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{__('Twitter Card')}}</label>
                        <div class="col-md-9">
                            <input type="url" placeholder="{{__('Twitter Card')}}" id="name" name="twitter_card" class="form-control" >
                            @error('twitter_card')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{__('Description')}}
                        </label>
                        <div class="col-md-9">
                            <textarea  name="description" class="form-control"  placeholder="{{__('Description')}}"></textarea>
                            @error('description')
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
