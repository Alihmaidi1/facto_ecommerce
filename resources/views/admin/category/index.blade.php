@extends('admin.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{__('All Categories')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{route('add_category')}}" class="btn btn-primary">
                <span>{{__('Add New category')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ __('Categories') }}</h5>
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
                    <th  data-breakpoints="lg">{{ __('Parent Category') }}</th>
                    <th data-breakpoints="lg">{{ __('Status') }}</th>
                    <th data-breakpoints="lg">{{ __('Rank') }}</th>
                    <th data-breakpoints="lg">{{__('Logo')}}</th>
                    <th data-breakpoints="lg">{{__('Show in Main')}}</th>
                    <th data-breakpoints="lg">{{__('Show in Header')}}</th>
                    <th width="10%" class="text-right">{{__('Options')}}</th>

                </tr>
            </thead>
            <tbody>

                @foreach($categories as $key => $category)
                    <tr>
                        <td style="vertical-align: middle">{{ ($key+1) + ($categories->currentPage() - 1)*$categories->perPage() }}</td>
                        <td style="vertical-align: middle">{{ $category->name }}</td>
                        <td style="vertical-align: middle">
                            @php
                                $parent = \App\Models\Category::where('id', $category->parent)->first();
                            @endphp
                            @if ($parent != null)
                                {{ $parent->name }}
                            @else
                                —
                            @endif
                        </td>
                        <td style="vertical-align: middle">{{ ($category->status)?"Yes":"No" }}</td>
                        <td style="vertical-align: middle">{{ $category->rank }}</td>
                        <td>
                            @if($category->logo != null)
                                <img src="{{ asset('uploads/category/'.$category->logo) }}" alt="{{__('Banner')}}" class="h-50px">
                            @else
                                —
                            @endif
                        </td>
                        <td style="vertical-align: middle">{{ ($category->show_in_main)?"Yes":"No" }} </td>
                        <td style="vertical-align: middle">{{ ($category->show_in_header)?"Yes":"No" }} </td>

                        <td style="vertical-align: middle" class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('categories.edit',$category->id)}}" title="{{ __('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="{{route('categories.destroy',$category->id)}}" data-href="{{route('categories.destroy',$category->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"  title="{{ __('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="aiz-pagination ">
            <span class="m-auto">{!! $categories->links() !!}</span>

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
