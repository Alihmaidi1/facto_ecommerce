@extends("admin.layouts.app")

@section("content")
<form action="{{route('currency.store')}}" method="POST">
    @csrf
    <div class="modal-header">
    	<h5 class="modal-title h6">{{__('Add New Currency')}}</h5>
    	</button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="name">{{__('Name')}}</label>
            <div class="col-sm-10">
                <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>

                @error('name')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="code">{{__('Code')}}</label>
            <div class="col-sm-10">
                <input type="text" placeholder="{{__('Code')}}" id="code" name="code" class="form-control" required>
                @error('code')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="code">{{__('Value In Dular')}}</label>
            <div class="col-sm-10">
                <input type="text" placeholder="{{__('Value In Dular')}}" id="code" name="value_in_dular" class="form-control" required>
                @error('code')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="exchange_rate">{{__('Status')}}</label>
            <div class="col-sm-10">

                <select class="select2 form-control aiz-selectpicker" name="active">

                    <option value="0">No</option>
                    <option value="1">Yes</option>

                </select>

                @error('active')
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
