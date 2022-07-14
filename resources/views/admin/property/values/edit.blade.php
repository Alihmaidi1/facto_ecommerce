@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{__('Attribute Value Information')}}</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">

          <form class="p-4" action="{{route('value.update')}}" method="POST">
              <input type="hidden" name="property_id" value="{{ $value->property_id }}">
              @csrf
              <input type="hidden" name="id" value="{{$value->id}}"/>
              <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="Attribute Value">
                      {{ __('Attribute Value')}}
                  </label>
                  <div class="col-sm-9">
                      <input type="text" placeholder="{{ __('Attribute Value')}}" id="value" name="value" class="form-control" required value="{{ $value->value }}">
                      @error('value')
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
