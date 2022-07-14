@extends('admin.layouts.app')

@section('content')

    <div class="col-lg-6  mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{__('Profile')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('admin.update.profile')}}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <input type="hidden" name="id" value="{{auth('web')->user()->id}}"/>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{__('Name')}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="{{__('Name')}}" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{__('Email')}}</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="{{__('Email')}}" name="email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="new_password">{{__('New Password')}}</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="{{__('New Password')}}" name="new_password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="confirm_password">{{__('Confirm Password')}}</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="{{__('Confirm Password')}}" name="confirm_password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Avatar')}} <small>(90x90)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div onclick="clickfile()" class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                                </div>
                                <div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input id="file" type="file"  name="avatar" class="selected-files d-none" value="{{ Auth::user()->avatar_original }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
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

    function  clickfile(){

            let file=document.getElementById("file");
            file.click();

    }

</script>

@endsection
