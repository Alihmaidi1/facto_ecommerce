@extends('admin.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ __('Website Pages') }}</h1>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h6 class="mb-0 fw-600">{{ __('All Pages') }}</h6>
		<a href="{{route('page.create')}}" class="btn btn-primary">{{ __('Add New Page') }}</a>
	</div>
	<div class="card-body">
		<table class="table aiz-table mb-0">
        <thead>
            <tr>
                <th data-breakpoints="lg">#</th>
                <th>{{__('title')}}</th>
                <th data-breakpoints="lg">{{__('Link')}}</th>
                <th data-breakpoints="lg">{{__('content')}}</th>
                <th data-breakpoints="lg">{{__('meta_title')}}</th>
                <th data-breakpoints="lg">{{__('meta_description')}}</th>
                <th data-breakpoints="lg">{{__('meta_keywords')}}</th>
                <th data-breakpoints="lg">{{__('Meta Logo')}}</th>
                <th class="text-right">{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($pages as $key => $page)
        	<tr>
        		<td>{{ $key+1 }}</td>
                <td>{{$page->title}}</td>
                <td>{{$page->link}}</td>
                <td>{{$page->content}}</td>
                <td>{{$page->meta_title}}</td>
                <td>{{$page->meta_description}}</td>
                <td>{{$page->meta_keywords}}</td>
                <td>

                    <img src="{{asset('uploads/page/'.$page->meta_logo)}}"/>

                </td>
                <td class="text-right">
        	  			<a href="{{route('page.edit',$page->id)}}" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">
							<i class="las la-pen"></i>
						</a>
						<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('page.delete',$page->id)}}" title="{{ __('Delete') }}">
          					<i class="las la-trash"></i>
          				</a>
				</td>
        	</tr>
        	@endforeach
        </tbody>
    </table>
	</div>
</div>
@endsection

@section('modal')
    @include('modals.delete')
@endsection
