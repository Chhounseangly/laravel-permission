@extends('layouts.app')

@section('title', 'Assign Permission User')
@section('content')
    <h1>Assign Permission for user {{ $user->name }}</h1>
    <form action="{{route('admin.user.assign.user.permissio.save')}}" class="inline-flex gap-2 items-center" method="POST">
        @csrf
        <input name="user_id" class="hidden" value="{{ $user->id }}" />
        @foreach ($permissions as $permission)
            <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="check{{ $permission->id }}">
                <input type="checkbox"
                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                    id="check{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}"
                    {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }} />
            </label>
            </span>
            <label class="mt-px font-light text-gray-700 cursor-pointer select-none" htmlFor="check{{ $permission->id }}">
                {{ $permission->name }}
            </label>
        @endforeach
        <button class="px-4 py-2 bg-green-600 rounded-md" type="submit">Save</button>
    </form>
@endsection
