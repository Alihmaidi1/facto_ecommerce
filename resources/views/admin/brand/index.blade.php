@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3">{{__('All Brands')}}</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ __('Brands') }}</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
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
		                    <th>#</th>
		                    <th>{{__('Name')}}</th>
		                    <th>{{__('Logo')}}</th>
		                    <th class="text-right">{{__('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($brands as $key => $brand)
		                    <tr>
		                        <td>{{ ($key+1) + ($brands->currentPage() - 1)*$brands->perPage() }}</td>
		                        <td>{{ $brand->name }}</td>
								<td>
		                            <img style="width:75px;height:auto" src="{{ asset('uploads/brands/'.$brand->logo) }}" alt="{{__('Brand')}}" class="h-50px">
		                        </td>
		                        <td class="text-right">
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('brands.edit', ['id'=>$brand->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ __('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('brands.destroy', $brand->id)}}" title="{{ __('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                	{{ $brands->links() }}
            	</div>
		    </div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ __('Add New Brand') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('brand.store') }}" enctype="multipart/form-data" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{__('Name')}}</label>
						<input type="text" placeholder="{{__('Name')}}" name="name" class="form-control" required>

                        @error('name')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                    </div>
					<div class="form-group mb-3">
						<label for="name">{{__('Logo')}} <small>({{ __('120x80') }})</small></label>
						<div class="input-group" data-toggle="aizuploader" data-type="image">
							<div onclick="clickfile()" class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
							</div>
							<div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="file" name="logo" id="file" class="d-none"/>
                        </div>
						<div class="file-preview box sm">
						</div>

                        @error('logo')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
					</div>
					<div class="form-group mb-3">
						<label for="name">{{__('Meta Description')}}</label>
						<textarea name="description" rows="5" class="form-control"></textarea>

                        @error('description')
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

@section('script')
<script type="text/javascript">
    function sort_brands(el){
        $('#sort_brands').submit();
    }

    function clickfile(){

        let file=document.getElementById('file')
        file.click()
    }
</script>
@endsection

