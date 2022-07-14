@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{__('All Attributes')}}</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ __('Attributes')}}</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ __('Name')}}</th>
							<th>{{ __('Values')}}</th>
							<th class="text-right">{{ __('Options')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($propertys as $key => $attribute)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$attribute->name}}</td>
								<td>
									{{--  @foreach($attribute->attribute_values as $key => $value)
									<span class="badge badge-inline badge-md bg-soft-dark">{{ $value->value }}</span>
									@endforeach  --}}
								</td>
								<td class="text-right">
									<a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{route('property.value',$attribute->id)}}" title="{{ __('Attribute values') }}">
										<i class="las la-cog"></i>
									</a>
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('property.edit',$attribute->id)}}" title="{{ __('Edit') }}">
										<i class="las la-edit"></i>
									</a>
									<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('property.delete',$attribute->id)}}" title="{{ __('Delete') }}">
										<i class="las la-trash"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
                <div class="aiz-pagination ">
                    <span class="m-auto">{!! $propertys->links() !!}</span>

                </div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ __('Add New Attribute') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{route('property.store')}}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{__('Name')}}</label>
						<input type="text" placeholder="{{ __('Name')}}" id="name" name="name" class="form-control" required>
                        @error('name')
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
