@extends('layouts.admin')

@section('content')

<h3 class="text-base font-semibold leading-6 text-gray-900">{{$event->name}}</h3>
{{ $users->links() }}

@if ($users->count() < 1) 
<button type="button" class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
  <i class="fas fa-users"></i>
  <span class="mt-2 block text-sm font-semibold text-gray-900">Belum ada peserta</span>
</button>

@endif


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