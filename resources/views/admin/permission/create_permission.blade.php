@extends('layouts.app')

@section('title', 'Roles')
@section('content')
    <div class="w-1/2 mx-auto">
        <h2 class="font-bold text-2xl py-4">Create Role</h2>
        <form method="POST" class="w-full flex flex-col gap-2" action="{{ route('admin.role.store') }}">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Role Name</label>
                <div class="my-2">
                    <input placeholder="Enter role name" id="name" name="name" type="text" autocomplete="name"
                        class="pl-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="mt-5">
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
