@extends('layouts.admin')

@section('content')
<a href="{{url('event/create')}}">
    <span class="inline-flex rounded-lg p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
        <i class="fas fa-plus"></i>
    </span>
</a>
<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-5">
    @foreach ($events as $event)
        
    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
      <div class="flex w-full items-center justify-between space-x-6 p-6">
        <div class="flex-1 truncate">
          <div class="flex items-center space-x-3">
            <h3 class="truncate text-sm font-medium text-gray-900">{{$event->name}}</h3>
            <span class="inline-block flex-shrink-0 rounded-ful bg-green-100  px-2 py-0.5 text-xs font-medium text-green-800">{{$event->date}}</span>
          </div>
          <p class="mt-1 truncate text-sm text-gray-500">{{$event->description}}</p>
        </div>
      </div>
      <div>
        <div class="-mt-px flex divide-x divide-gray-200">
          <div class="flex w-0 flex-1">
            <a href="{{url('event/'.$event->id.'/edit')}}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                <i class="fas fa-edit"></i>
              Edit
            </a>
          </div>
          <div class="-ml-px flex w-0 flex-1">
              <a onclick="return confirm('Apakah anda ingin menghapus {{$event->name}} ?');" href="{{url('event/delete/'.$event->id)}}" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                <i class="fas fa-trash"></i>
                Delete
              </a>
          </div>
        </div>
      </div>
    </li>
  
    @endforeach

    <!-- More people... -->
  </ul>
@endsection