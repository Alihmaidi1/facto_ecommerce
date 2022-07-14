@extends('admin.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col">
    			<h1 class="h3">{{ __('Website Footer') }}</h1>
    		</div>
    	</div>
    </div>
    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0">{{ __('Footer Widget') }}</h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
    			<div class="col-lg-6">
    				<div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">{{ __('About Widget') }}</h6>
    					</div>
    					<div class="card-body">
    						<form action="{{route('footer.updatelogo')}}" method="POST" enctype="multipart/form-data">
    							@csrf
    							<div class="form-group">
    			                    <label class="form-label" for="signinSrEmail">{{ __('Footer Logo') }}</label>
    			                    <div class="input-group " data-toggle="aizuploader" data-type="image">
    			                        <div onclick="clickfile()" class="input-group-prepend">
    			                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
    			                        </div>
                                        <input id="file" class="d-none" type="file" name="logo"/>
    			                        <div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
    			                    </div>
    								<div class="file-preview"></div>
                                    @error('logo')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                    @enderror

    			                </div>
    			                <div class="form-group">
    								<label>{{ __('About description') }} ({{ __('Translatable') }})</label>
    								<input type="hidden" name="" value="about_us_description">
    								<textarea class="aiz-text-editor form-control" name="logo_description" data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150">
                                    {{$footer->logo_description}}
                                    </textarea>
                                    @error('logo_description')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                    @enderror

                                </div>
    							<div class="text-right">
    								<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">{{ __('Contact Info Widget') }}</h6>
    					</div>
    					<div class="card-body">
                            <form action="{{route('footer.updatecontact')}}" method="POST" enctype="multipart/form-data">
    							@csrf
                                <div class="form-group">
    								<label>{{ __('Contact address') }} ({{ __('Translatable') }})</label>
    								<input type="text" class="form-control" name="address" placeholder="{{ __('Address') }}" name="contact_address" value="{{$footer->address}}">
                                    @error('address')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
    								<label>{{ __('Contact phone') }}</label>
    								<input type="text" class="form-control" name="phone" placeholder="{{ __('Phone') }}" name="contact_phone" value="{{$footer->phone}}">

                                    @error('phone')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                    @enderror


                                </div>
                                <div class="form-group">
    								<label>{{ __('Contact email') }}</label>
    								<input type="text" name="email" class="form-control" placeholder="{{ __('Email') }}" name="contact_email" value="{{$footer->email}}">

                                    @error('email')
                                    <span style="color:red;font-size:11px">{{$message}}</span>
                                    @enderror


                                </div>
    							<div class="text-right">
    								<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
                <div class="col-lg-12">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">{{ __('Link Widget One') }}</h6>
    					</div>
    					<div class="card-body">
                            <form action="{{route('footer.updatenav')}}" method="POST" enctype="multipart/form-data">
                                @csrf
    							<div class="form-group">
    								<label>{{ __('Title') }} ({{ __('Translatable') }})</label>
    								<input type="hidden" name="" value="widget_one">
    								<input type="text" class="form-control" placeholder="Widget title" name="navtitle" value="">
    							</div>
    			                <div class="form-group">
    								<label>{{ __('Links') }} - ({{ __('Translatable') }} {{ __('Label') }})</label>
    								<div class="w3-links-target">
    									<input type="hidden" name="" value="widget_one_labels">
    									<input type="hidden" name="types[]" value="widget_one_links">

    								</div>
    								<button
    									type="button"
    									class="btn btn-soft-secondary btn-sm"
    									data-toggle="add-more"
    									data-content='<div class="row gutters-5">
    										<div class="col-4">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="{{__('Label')}}" name="widget_one_labels[]">
    											</div>
    										</div>
    										<div class="col">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]">
    											</div>
    										</div>
    										<div class="col-auto">
    											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    												<i class="las la-times"></i>
    											</button>
    										</div>
    									</div>'
    									data-target=".w3-links-target">
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
    	</div>
    </div>

    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0">{{ __('Footer Bottom') }}</h6>
    	</div>
        <form action="{{route('footer.updatesocial')}}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="card-body">
                <div class="card shadow-none bg-light">
                    <div class="card-header">
  						<h6 class="mb-0">{{ __('Copyright Widget ') }}</h6>
  					</div>
                    <div class="card-body">
                        <div class="form-group">
                  			<label>{{ __('Copyright Text') }} ({{ __('Translatable') }})</label>
                  			<textarea class="aiz-text-editor form-control" name="copy_right" data-buttons='[["font", ["bold", "underline", "italic"]],["insert", ["link"]],["view", ["undo","redo"]]]' placeholder="Type.." data-min-height="150">
                            </textarea>
                            @error('copy_right')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                        </div>
                    </div>
                </div>
                <div class="card shadow-none bg-light">
                  <div class="card-header">
						<h6 class="mb-0">{{ __('Social Link Widget ') }}</h6>
					</div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-md-2 col-from-label">{{__('Show Social Links?')}}</label>
                      <div class="col-md-9">
                        <label class="aiz-switch aiz-switch-success mb-0">
                          <input type="checkbox" name="social_status" >
                          <span></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Social Links') }}</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-facebook-f"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="http://" name="facebook" value="{{ get_setting('facebook_link')}}">
                            @error('facebook')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-twitter"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="http://" name="twitter" value="{{ get_setting('twitter_link')}}">
                            @error('twitter')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror


                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="http://" name="instagram" value="{{ get_setting('instagram_link')}}">
                            @error('instagram')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-youtube"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="http://" name="youtube" value="{{ get_setting('youtube_link')}}">
                            @error('youtube')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lab la-linkedin-in"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="http://" name="linkedin" value="{{ get_setting('linkedin_link')}}">
                            @error('linkedin')
                            <span style="color:red;font-size:11px">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                  </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
	</div>
@endsection

@section('script')

<script>

    function clickfile(){


    let file=document.getElementById('file');
    file.click()


    }
</script>

@endsection
