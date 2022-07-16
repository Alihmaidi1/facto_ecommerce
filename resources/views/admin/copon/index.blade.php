@extends('admin.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{__('All Copons')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{route('copon.create')}}" class="btn btn-primary">
                <span>{{__('Add New Copon')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ __('Copon') }}</h5>
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
                    <th>{{__('Code')}}</th>
                    <th  data-breakpoints="lg">{{ __('name') }}</th>

                    <th  data-breakpoints="lg">{{ __('Type') }}</th>

                    <th data-breakpoints="lg">{{ __('Value') }}</th>
                    <th data-breakpoints="lg">{{ __('Offer Start At') }}</th>
                    <th data-breakpoints="lg">{{ __('Offer End At') }}</th>
                    <th data-breakpoints="lg">{{ __('Brand Have This Copon') }}</th>
                    <th data-breakpoints="lg">{{ __('Category Have This Copon') }}</th>
                    <th data-breakpoints="lg">{{ __('Product Have This Copon') }}</th>

                    <th width="10%" class="text-right">{{__('Options')}}</th>

                </tr>
            </thead>
            <tbody>

                @foreach($copons as $key => $copon)
                    <tr>
                        <td style="vertical-align: middle">{{ ($key+1) + ($copons->currentPage() - 1)*$copons->perPage() }}</td>
                        <td style="vertical-align: middle">{{ $copon->code }}</td>
                        <td style="vertical-align: middle">{{ $copon->name }}</td>

                        <td style="vertical-align: middle">{{ $copon->type }}</td>
                        <td style="vertical-align: middle">{{ $copon->value }}</td>
                        <td style="vertical-align: middle">{{ $copon->date_start_at }}</td>
                        <td style="vertical-align: middle">{{ $copon->date_end_at }}</td>


                        <td >
                            @if(count($copon->brands)!=0)
                            <select class=" form-control">
                                @foreach ($copon->brands as $key => $brand)
                                <option selected value="{{ $brand->id }}" ><span><span>{{ $brand->name }}</span></span></option>
                                @endforeach
                            </select>
                            @else

                            Not Have

                            @endif

                        </td>



                        <td >


                            @if(count($copon->categorys)!=0)
                            <select class=" form-control">
                                @foreach ($copon->categorys as $key => $category)
                                <option selected value="{{ $category->id }}" ><span><span>{{ $category->name }}</span></span></option>
                                @endforeach
                            </select>
                            @else
                            Not Have
                            @endif

                        </td>



                        <td >

                            @if(count($copon->products)!=0)


                            <select class=" form-control">
                                @foreach ($copon->products as $key => $product)
                                <option selected value="{{ $product->id }}" ><span><span>{{ $product->name }}</span></span></option>
                                @endforeach
                            </select>

                            @else

                            Not Have

                            @endif

                        </td>




                        <td style="vertical-align: middle" class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('copon.edit',$copon->id)}}" title="{{ __('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="{{route('categories.destroy',$copon->id)}}" data-href="{{route('copon.destroy',$copon->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"  title="{{ __('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="aiz-pagination ">
            <span class="m-auto">{!! $copons->links() !!}</span>

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
