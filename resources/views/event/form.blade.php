
@extends('layouts.admin')

@section('content')

<form method="post" action="{{url('event')}}" class="space-y-8 divide-y bg-white divide-gray-200 px-4 py-5 sm:p-6 shadow sm:overflow-hidden sm:rounded-md">
    @csrf
    <input type="hidden" name="id" value="{{$event->id}}" id="">

    @if ($errors)
        {{-- {{dd($errors)}} --}}
    @endif
    <div class="space-y-8 divide-y divide-gray-200">
      <div class="pt-8">
        <div>
          <h3 class="text-base font-semibold leading-6 text-gray-900">Event Information</h3>
          <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
              <input type="text" name="name" value="{{old('name') ? : $event->name}}" id="first-name" autocomplete="given-name" class="p-5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date time</label>
            <div class="mt-2">
              @php
                  $date = \Carbon\Carbon::now();
                  if ($event->date) {
                    $date = \Carbon\Carbon::create($event->date)->format('Y-m-d');
                  }
              @endphp
              <input id="date" name="date" type="date" value="{{$date}}"  autocomplete="date" class="p-5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          
          <div class="sm:col-span-3">
            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
            <div class="mt-2">
              <input id="price" name="price" type="number" value="{{old('price') ? : $event->price}}"  autocomplete="price" class="p-5 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-6">
            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
              <textarea name="description" class="p-5 block w-full max-w-lg rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6" id="" cols="30" rows="10">{{old('description') ? : $event->description}}</textarea>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  
    <div class="pt-5">
      <div class="flex justify-end">
        <button type="button" class="rounded-md bg-white py-2 px-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</button>
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </div>
  </form>
@endsection