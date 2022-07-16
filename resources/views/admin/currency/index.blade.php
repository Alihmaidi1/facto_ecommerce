@extends('admin.layouts.app')

@section('content')

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{__('System Default Currency')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('currency.default')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="control-label">{{__('System Default Currency')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control aiz-selectpicker" name="currency" data-live-search="true">
                                @foreach($currencys as $key => $currency)

                                <option @if($currency->is_default) selected @endif value="{{$currency->id}}">{{$currency->name}}</option>

                                @endforeach



                            </select>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-sm btn-primary" type="submit">{{__('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{__('All Currencies')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a  href="{{route('currency.create')}}" class="btn btn-circle btn-primary">
				<span>{{__('Add New Currency')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
    <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ __('All Currencies') }}</h5>
        </div>
        <div class="col-md-4">
            <form class="" id="sort_currencies" action="" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ __('Type name & Enter') }}">
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{__('Currency name')}}</th>
                    <th data-breakpoints="lg">{{__('Currency code')}}</th>
                    <th data-breakpoints="lg">{{__('Amount In Dular')}}</th>
                    <th data-breakpoints="lg">{{__('Status')}}</th>
                    <th data-breakpoints="lg">{{__('is Default')}}</th>
                    <th class="text-right">{{__('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencys as $key => $currency)
                    <tr>
                        <td>{{ ($key+1) + ($currencys->currentPage() - 1)*$currencys->perPage() }}</td>
                        <td>{{$currency->name}}</td>
                        <td>{{$currency->code}}</td>
                        <td>{{$currency->value_in_dular}}</td>

                        <td>

                        {{($currency->active==1)?"Yes":"No"}}

                        </td>
                        <td>

                        {{($currency->is_default)?"Yes":"No"}}

                        </td>

                        <td class="text-right">
                            <a href="{{route('currency.edit',$currency->id)}}" class="btn btn-soft-primary btn-icon btn-circle btn-sm"  title="{{ __('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"  data-href="{{route('currency.delete', $currency->id)}}"  title="{{ __('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $currencys->links() }}
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

@section('script')
    <script type="text/javascript">

        function sort_currencies(el){
            $('#sort_currencies').submit();
        }

        function currency_modal(){
            $.get('{{ route('currency.create') }}',function(data){
                $('#modal-content').html(data);
                $('#add_currency_modal').modal('show');
            });
        }


        function edit_currency_modal(id){
            $.post('',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#currency_modal_edit .modal-content').html(data);
                $('#currency_modal_edit').modal('show', {backdrop: 'static'});
            });
        }
    </script>
@endsection
