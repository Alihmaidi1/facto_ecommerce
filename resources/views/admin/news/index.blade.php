@extends('admin.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{__('All News')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{route('new.create')}}" class="btn btn-primary">
                <span>{{__('Add New ')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ __('News') }}</h5>
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
                    <th>{{__('Title')}}</th>
                    <th data-breakpoints="lg">{{__('Description')}}</th>
                    <th data-breakpoints="lg">{{ __('Status') }}</th>
                    <th width="10%" class="text-right">{{__('Options')}}</th>

                </tr>
            </thead>
            <tbody>

                @foreach($news as $key => $new)
                    <tr>
                        <td style="vertical-align: middle">{{ ($key+1) + ($news->currentPage() - 1)*$news->perPage() }}</td>
                        <td style="vertical-align: middle">{{ $new->title }}</td>
                        <td style="vertical-align: middle">{{ $new->description }}</td>
                        <td style="vertical-align: middle">
                        {{($new->status==1)?"Yes":"No"}}
                        </td>

                        <td style="vertical-align: middle" class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('news.edit',$new->id)}}" title="{{ __('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="{{route('news.delete',$new->id)}}" data-href="{{route('news.delete',$new->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"  title="{{ __('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="aiz-pagination ">
            <span class="m-auto">{!! $news->links() !!}</span>

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
