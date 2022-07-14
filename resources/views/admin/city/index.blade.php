@extends('admin.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{__('All Citys')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{route('city.create')}}" class="btn btn-primary">
                <span>{{__('Add New city')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ __('City') }}</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ __('Type name & Enter') }}">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table style="opacity: 1" class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{__('Name')}}</th>
                    <th data-breakpoints="lg">{{ __('Country') }}</th>
                    <th data-breakpoints="lg">{{ __('Status') }}</th>
                    <th data-breakpoints="lg">{{ __('Rank') }}</th>
                    <th width="10%" class="text-right">{{__('Options')}}</th>

                </tr>
            </thead>
            <tbody>

                @foreach($citys as $key => $city)
                    <tr>
                        <td style="vertical-align: middle">{{ ($key+1) + ($citys->currentPage() - 1)*$citys->perPage() }}</td>
                        <td style="vertical-align: middle">{{ $city->name }}</td>
                        <td style="vertical-align: middle">{{ $city->country->country }}</td>

                        <td style="vertical-align: middle">
                        {{($city->status==1)?"Yes":"No"}}
                        </td>
                        <td style="vertical-align: middle">{{ $city->rank }}</td>

                        <td style="vertical-align: middle" class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('city.edit',$city->id)}}" title="{{ __('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="{{route('city.delete',$city->id)}}" data-href="{{route('city.delete',$city->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"  title="{{ __('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="aiz-pagination ">
            <span class="m-auto">{!! $citys->links() !!}</span>

        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('modals.delete')
@endsection


@section('script')
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ __('Featured categories updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ __('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
