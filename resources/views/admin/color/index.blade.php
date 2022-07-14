@extends('admin.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">{{ __('All Colors') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <form class="" id="sort_colors" action="" method="GET">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ __('Colors') }}</h5>
                        <div class="col-md-5">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control form-control-sm" id="search" name="search"
                                    @isset($sort_search) value="{{ $sort_search }}" @endisset
                                    placeholder="{{ __('Type color name & Enter') }}">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th class="text-right">{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $key => $color)
                                <tr>
                                    <td>{{ ($key+1) + ($colors->currentPage() - 1)*$colors->perPage() }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                            href="{{route('color.edit',$color->id)}}"
                                            title="{{ __('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                            data-href=""
                                            title="{{ __('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        {{ $colors->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ __('Add New Color') }}</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('color.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" placeholder="{{ __('Name') }}" id="name" name="name"
                                class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror

                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{ __('Color Code') }}</label>
                            <input type="color" placeholder="{{ __('Color Code') }}" id="code" name="code"
                                class="form-control" value="{{ old('code') }}" required>
                                @error('code')
                                <span style="color:red;font-size:11px">{{$message}}</span>
                                @enderror

                        </div>
                        <div class="form-group mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('modal')
    @include('modals.delete')
@endsection

