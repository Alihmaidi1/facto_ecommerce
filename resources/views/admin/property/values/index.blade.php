@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{__('Attribute Detail')}}</h1>
	</div>
</div>

<div class="row">
    <!-- Small table -->
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">
                    {{ $property->name }}
                </strong>
            </div>

            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Value') }}</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($values as $key => $attribute_value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{ $attribute_value->value }}
                            </td>

                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('value.edit',$attribute_value->id)}}" title="{{ __('Edit') }}">
									<i class="las la-edit"></i>
								</a>
								<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('value.delete',$attribute_value->id)}}" title="{{ __('Delete') }}">
									<i class="las la-trash"></i>
								</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="aiz-pagination ">
                    <span class="m-auto">{!! $values->links() !!}</span>

                </div>

            </div>
        </div>

    </div>

    <div class="col-md-5">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ __('Add New Attribute Value') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{route('property_value.store')}}" method="POST">
				 	@csrf
				 	<div class="form-group mb-3">
				 		<label for="name">{{__('Attribute Name')}}</label>
				 		<input type="hidden" name="attribute_id" value="{{$property->id}}">
				 		<input type="text" placeholder="{{ __('Name')}}" name="name" value="{{$property->name}}" class="form-control" readonly>
                         @error('name')
                         <span style="color:red;font-size:11px">{{$message}}</span>
                         @enderror

                    </div>
				 	<div class="form-group mb-3">
				 		<label for="name">{{__('Attribute Value')}}</label>
				 		<input type="text" placeholder="{{ __('Name')}}" id="value" name="value" class="form-control" required>
                         @error('value')
                         <span style="color:red;font-size:11px">{{$message}}</span>
                         @enderror

                    </div>
				 	<div class="form-group mb-3 text-right">
				 		<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
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
