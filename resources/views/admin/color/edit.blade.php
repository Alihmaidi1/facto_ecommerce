@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{__('Color Information')}}</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="p-4" action="{{route('color.update')}}" method="POST">
                <input name="_method" type="hidden" value="POST">
                @csrf
                <input type="hidden" name="id" value="{{$color->id}}"/>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">
                        {{ __('Name')}}
                    </label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{ __('Name')}}" id="name" name="name" class="form-control" required value="{{ $color->name }}">
                        @error('name')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="code">
                        {{ __('Color Code')}}
                    </label>
                    <div class="col-sm-9">
                        <input type="color" placeholder="{{ __('Color Code')}}" id="code" name="code" class="form-control" required value="{{ $color->code }}">
                        @error('code')
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
