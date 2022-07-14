@extends('admin.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ __('Edit  Page') }}</h1>
		</div>
	</div>
</div>
<div class="card">
	<form action="{{route('page.update')}}" method="POST" enctype="multipart/form-data">
		@csrf
        <input type="hidden" name="id" value="{{$page->id}}"/>
		<div class="card-header">
			<h6 class="fw-600 mb-0">{{ __('Page Content') }}</h6>
		</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{__('Title')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" value="{{$page->title}}" class="form-control" placeholder="{{__('Title')}}" name="title" required>

                    @error('title')
                    <span style="color:red;font-size:11px">{{$message}}</span>
                    @enderror
                </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{__('Link')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group d-block d-md-flex">
						<div class="input-group-prepend "><span class="input-group-text flex-grow-1">{{url('/')}}</span></div>
						<input type="text" value="{{$page->link}}" class="form-control w-100 w-md-auto" placeholder="{{ __('Slug') }}" name="url" required>

                        @error('url')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                    </div>
					<small class="form-text text-muted">{{ __('Use character, number, hypen only') }}</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{__('Add Content')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<textarea
						class="aiz-text-editor form-control"
						data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
						placeholder="Content.."
						data-min-height="300"
						name="content"
						required
					>{{$page->content}}</textarea>

                    @error('content')
                    <span style="color:red;font-size:11px">{{$message}}</span>
                    @enderror

                </div>
			</div>
		</div>

		<div class="card-header">
			<h6 class="fw-600 mb-0">{{ __('Seo Fields') }}</h6>
		</div>
		<div class="card-body">

			<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{__('Meta Title')}}</label>
					<div class="col-sm-10">
						<input type="text" value="{{$page->meta_title}}" class="form-control" placeholder="{{__('Title')}}" name="meta_title">

                        @error('meta_title')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                    </div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{__('Meta Description')}}</label>
				<div class="col-sm-10">
					<textarea class="resize-off form-control" placeholder="{{__('Description')}}" name="meta_description">{{$page->meta_description}}</textarea>

                    @error('meta_description')
                    <span style="color:red;font-size:11px">{{$message}}</span>
                    @enderror
                </div>
			</div>

			<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{__('Keywords')}}</label>
					<div class="col-sm-10">
						<textarea class="resize-off form-control" placeholder="{{__('Keyword, Keyword')}}" name="meta_keywords">{{$page->meta_keywords}}</textarea>

                        @error('meta_keywords')
                        <span style="color:red;font-size:11px">{{$message}}</span>
                        @enderror
                        <small class="text-muted">{{ __('Separate with coma') }}</small>
					</div>
			</div>

			<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{__('Meta Image')}}</label>
					<div class="col-sm-10">
						<div class="input-group " data-toggle="aizuploader" data-type="image">
								<div onclick="clickfile()" class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
								</div>
								<div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                                <input class="d-none" type="file" id="file" name="logo"/>
                            </div>
						<div class="file-preview">
						</div>
					</div>
			</div>

			<div class="text-right">
				<button type="submit" class="btn btn-primary">{{ __('Save Page') }}</button>
			</div>
		</div>
	</form>
</div>
@endsection
@section("script")

<script>


    function clickfile(){


    let file=document.getElementById("file")
    file.click()
    }

</script>

@endsection
