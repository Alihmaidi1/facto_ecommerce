@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{__('Attribute Information')}}</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
          <ul class="nav nav-tabs nav-fill border-light">
            {{--  @foreach (\App\Models\Language::all() as $key => $language)
              <li class="nav-item">
                <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('attributes.edit', ['id'=>$attribute->id, 'lang'=> $language->code] ) }}">
                  <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                  <span>{{ $language->name }}</span>
                </a>
              </li>
             @endforeach  --}}
          </ul>
          <form class="p-4" action="{{route('property.update')}}" method="POST">
              @csrf
            <input type="hidden" name="id" value="{{$attribute->id}}"/>
              <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="name">{{ __('Name')}} <i class="las la-language text-danger" title="{{__('Translatable')}}"></i></label>
                  <div class="col-sm-9">
                      <input type="text" placeholder="{{ __('Name')}}" id="name" name="name" class="form-control" required value="{{ $attribute->name }}">
                      @error('name')
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
