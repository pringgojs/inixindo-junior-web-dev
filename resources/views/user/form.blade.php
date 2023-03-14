
@extends('layouts.admin')

@section('content')
<form method="post" action="{{url('users')}}" class="space-y-8 divide-y bg-white divide-gray-200 px-4 py-5 sm:p-6 shadow sm:overflow-hidden sm:rounded-md">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}" id="">
    <div class="space-y-8 divide-y divide-gray-200">
      <div class="pt-8">
        <div>
          <h3 class="text-base font-semibold leading-6 text-gray-900">Personal Information</h3>
          <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
              <input type="text" name="name" value="{{$user->name}}" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" value="{{$user->email}}"  autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
            <div class="mt-2">
              <select id="country" name="role_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="1" @if($user->role_id == 1) selected @endif>Admin</option>
                <option value="2" @if($user->role_id == 2) selected @endif>Operator</option>
              </select>
            </div>
          </div>
  
          <div class="sm:col-span-2">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password {{$user ? '(Optional)' : ''}}</label>
            <div class="mt-2">
              <input type="text" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-2">
            <label for="repassword" class="block text-sm font-medium leading-6 text-gray-900">Re-entry Password  {{$user ? '(Optional)' : ''}}</label>
            <div class="mt-2">
              <input type="text" name="repassword" id="repassword" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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