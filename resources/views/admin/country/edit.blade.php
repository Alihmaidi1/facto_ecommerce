@extends("admin.layouts.app")

@section("content")
<form action="{{route('country.update')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$country->id}}"/>
    <div class="modal-header">
    	<h5 class="modal-title h6">{{__('Edit Country')}}</h5>
    	</button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="name">{{__('Name')}}</label>
            <div class="col-sm-10">
                <input type="text" value="{{$country->country}}" placeholder="{{__('Country Name')}}" id="name" name="country" class="form-control" required>


                @error('country')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror


            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="code">{{__('Rank')}}</label>
            <div class="col-sm-10">
                <input type="text" value="{{$country->rank}}" placeholder="{{__('Rank')}}" id="code" name="rank" class="form-control" required>

                @error('rank')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror


            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="exchange_rate">{{__('Status')}}</label>
            <div class="col-sm-10">

                <select class="select2 form-control aiz-selectpicker" name="status">

                    <option @if($country->status==0) selected @endif value="0">No</option>
                    <option @if($country->status==1) selected @endif value="1">Yes</option>

                </select>


                @error('status')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="code">{{__('Logo')}}</label>
            <div class="col-sm-10">

                <div class="input-group" data-toggle="aizuploader" data-type="image">
                    <div onclick="clickfile()" class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                    </div>
                    <div onclick="clickfile()" class="form-control file-amount">{{ __('Choose File') }}</div>
                    <input id="file" type="file"  name="logo" class="selected-files d-none">
                </div>
                <div class="file-preview box sm">
                </div>


                @error('logo')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>




    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary">{{__('Save')}}</button>
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">{{__('Cancel')}}</button>
    </div>
</form>


@endsection

@section('script')
<script>
function clickfile(){

    let file=document.getElementById('file');
    file.click();
}
</script>

@endsection
