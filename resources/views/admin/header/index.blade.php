@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Header Setting') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{route('header.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
	                    <label class="col-md-3 col-from-label">{{ __('Header Logo') }}</label>
						<div class="col-md-8">
		                    <div class=" input-group " data-toggle="aizuploader" data-type="image">
		                        <div onclick="clickfile()" class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
		                        </div>
		                        <div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input  id="file" type="file" class="d-none" name="logo"/>
                            </div>
						</div>
	                </div>
                    <div class="form-group row">
						<label class="col-md-3 col-from-label">{{__('Show Language Switcher?')}}</label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input @if($header->language==1) checked @endif type="checkbox"  name="show_language_switcher" >
								<span></span>
							</label>
						</div>
					</div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">{{__('Show Currency Switcher?')}}</label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input @if($header->currency==1) checked @endif  type="checkbox" name="show_currency_switcher" >
								<span></span>
							</label>
						</div>
					</div>
	                <div class="form-group row">
						<label class="col-md-3 col-from-label">{{__('Enable stikcy header?')}}</label>
						<div class="col-md-8">
							<label class="aiz-switch aiz-switch-success mb-0">
								<input @if($header->fix==1) checked @endif  type="checkbox" name="header_stikcy" @if( get_setting('header_stikcy') == 'on') checked @endif>
								<span></span>
							</label>
						</div>
					</div>


                    <div class="border-top pt-3">
						<label class="">{{__('Header Nav Menu')}}</label>
						<div class="header-nav-menu">


                            @foreach($navs as $key => $nav)
                            <div class="row gutters-5">
								<div class="col-4">
									<div class="form-group">
										<input type="text" value="{{$nav->label}}" class="form-control" placeholder="{{__('Label')}}" name="header_menu_labels[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" value="{{$nav->link}}" class="form-control" placeholder="{{ __('Link with') }} http:// {{ __('or') }} https://" name="header_menu_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>
                            @endforeach


						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col-4">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="{{__('Label')}}" name="header_menu_labels[]">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="{{ __('Link with') }} http:// {{ __('or') }} https://" name="header_menu_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".header-nav-menu">
							{{ __('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection


@section('script')
<script>

    let file=document.getElementById('file');
    function clickfile(){

        file.click();
    }


</script>

@endsection
