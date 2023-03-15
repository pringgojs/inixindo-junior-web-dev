@extends('layouts.admin')

@section('content')
<a href="{{url('users/create')}}">
    <span class="inline-flex rounded-lg p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
        <i class="fas fa-plus"></i>
    </span>
</a>

<div class="flex items-center gap-x-4 text-xs pt-5">
  <time datetime="2020-03-16" class="text-gray-900">Filter: </time>
  @foreach ($roles as $item)
  <a href="{{url('users?role_id='.$item->id)}}" class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">{{$item->name}}</a>
    
  @endforeach
</div>

{{ $users->appends(request()->all())->links() }}

<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-5">
    @foreach ($users as $user)
        
    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
      <div class="flex w-full items-center justify-between space-x-6 p-6">
        <div class="flex-1 truncate">
          <div class="flex items-center space-x-3">
            <h3 class="truncate text-sm font-medium text-gray-900">{{$user->name}}</h3>
            <span class="inline-block flex-shrink-0 rounded-full {{$user->role->id == 1 ? 'bg-green-100' : 'bg-yellow-100'}}  px-2 py-0.5 text-xs font-medium text-green-800">{{$user->role->name}}</span>
          </div>
          <p class="mt-1 truncate text-sm text-gray-500">{{$user->email}}</p>
        </div>
        <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
      </div>
      <div>
        <div class="-mt-px flex divide-x divide-gray-200">
          <div class="flex w-0 flex-1">
            <a href="{{url('users/'.$user->id.'/edit')}}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                <i class="fas fa-edit"></i>
              Edit
            </a>
          </div>
          <div class="-ml-px flex w-0 flex-1">
              <a onclick="return confirm('Apakah anda ingin menghapus {{$user->name}} ?');" href="{{url('users/'.$user->id.'/delete')}}" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
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
  {{ $users->appends(request()->all())->links() }}
@endsection