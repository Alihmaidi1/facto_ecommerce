@extends("admin.layouts.app")

@section("content")
<form action="{{route('city.update')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$city->id}}"/>
    <div class="modal-header">
    	<h5 class="modal-title h6">{{__('Add New City')}}</h5>
    	</button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="name">{{__('Name')}}</label>
            <div class="col-sm-10">
                <input type="text" value="{{$city->name}}" placeholder="{{__('City Name')}}" id="name" name="name" class="form-control" required>

                @error('name')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="code">{{__('Rank')}}</label>
            <div class="col-sm-10">
                <input type="text" value="{{$city->rank}}" placeholder="{{__('Rank')}}" id="code" name="rank" class="form-control" required>


                @error('rank')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="exchange_rate">{{__('Status')}}</label>
            <div class="col-sm-10">

                <select class="select2 form-control aiz-selectpicker" name="status">

                    <option @if($city->status==0) selected @endif value="0">No</option>
                    <option @if($city->status==1) selected @endif value="1">Yes</option>

                </select>


                @error('status')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="exchange_rate">{{__('Country Name')}}</label>
            <div class="col-sm-10">

                <select class="select2 form-control aiz-selectpicker" name="country_id">

                    @foreach($countrys as  $country)

                    <option @if($city->country_id==$country->id) selected @endif value="{{$country->id}}">{{$country->country}}</option>

                    @endforeach
                </select>


                @error('country_id')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror
            </div>
        </div>






    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary">{{__('Save')}}</button>
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
