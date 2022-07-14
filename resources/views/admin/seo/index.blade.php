@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{__('All Seos')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{route('seo.create')}}" class="btn btn-primary">
                <span>{{__('Add New Seos')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ __('Seos') }}</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ __('Type name & Enter') }}">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table  class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{__('Url')}}</th>
                    <th data-breakpoints="lg">{{__('Title')}}</th>
                    <th data-breakpoints="lg">{{__('Description')}}</th>
                    <th data-breakpoints="lg">{{__('facebook')}}</th>
                    <th data-breakpoints="lg">{{__('twitter Org')}}</th>
                    <th data-breakpoints="lg">{{__('twitter Card')}}</th>
                    <th data-breakpoints="lg">{{__('Logo')}}</th>
                    <th class="text-right">{{__('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seos as $key => $seo)
                    <tr>
                        <td style="vertical-align: middle">{{ ($key+1) + ($seos->currentPage() - 1)*$seos->perPage() }}</td>
                        <td style="vertical-align: middle">{{$seo->url}}</td>
                        <td style="vertical-align: middle">{{$seo->title}}</td>
                        <td style="vertical-align: middle">{{$seo->description}}</td>
                        <td style="vertical-align: middle"><a href="{{$seo->facebook}}">{{$seo->facebook}}</a></td>
                        <td style="vertical-align: middle"><a href="{{$seo->twitter_org}}">{{$seo->twitter_org}}</a></td>
                        <td style="vertical-align: middle"><a href="{{$seo->twitter_card}}">{{$seo->twitter_card}}</a></td>


                        <td style="vertical-align: middle">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <img src="{{ asset('uploads/seos/'.$seo->logo) }}" alt="{{__('Banner')}}" class="h-50px">
                            </label>
                        </td>


                        <td style="vertical-align: middle" class="text-right">
                            <a href="{{route('seo.edit',$seo->id)}}" class="btn btn-soft-primary btn-icon btn-circle btn-sm">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="{{route('seo.delete',$seo->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm" onclick="edit_currency_modal('{{$seo->id}}');" title="{{ __('Edit') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $seos->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')

    <!-- Delete Modal -->
    @include('modals.delete')

    <div class="modal fade" id="add_currency_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="currency_modal_edit">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

@endsection
