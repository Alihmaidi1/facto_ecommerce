@extends("admin.layouts.app")

@section("content")
<form action="{{route('new.update')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$new->id}}"/>
    <div class="modal-header">
    	<h5 class="modal-title h6">{{__('Edit News ')}}</h5>
    	</button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="name">{{__('title')}}</label>
            <div class="col-sm-10">
                <input type="text" value="{{$new->title}}" placeholder="{{__('news Title')}}" id="name" name="title" class="form-control" required>



                @error('title')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="code">{{__('description')}}</label>
            <div class="col-sm-10">

                <textarea name="description" rows="5" class="form-control">{{$new->description}}</textarea>


                @error('description')
                <span style="color:red;font-size:11px">{{$message}}</span>
                @enderror

            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-from-label" for="exchange_rate">{{__('Status')}}</label>
            <div class="col-sm-10">

                <select class="select2 form-control aiz-selectpicker" name="status">

                    <option @if($new->status==0) selected @endif value="0">No</option>
                    <option @if($new->status==1) selected @endif value="1">Yes</option>

                </select>


                @error('status')
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
