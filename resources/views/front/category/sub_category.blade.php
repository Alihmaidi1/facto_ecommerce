@if(isset($second_level->categorys)&&count($second_level->categorys)>0)
<div class="dropend">
    <a class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$second_level->name}}
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

        @foreach ($second_level->categorys as $category )
        <li class="mb-2">@include("front.category.sub_category",['second_level' => $category])</li>

        @endforeach

    </ul>
  </div>
@else
        <a class="text-reset" href="{{route('user.single_category',$second_level->id)}}" >{{ $second_level->name }}</a>
@endif
