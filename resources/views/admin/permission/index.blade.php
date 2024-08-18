@extends('layouts.app')

@section('title', 'Permission')
@section('content')
    <div class="w-full">
        <div class="flex justify-between py-4">
            <h1 class="text-3xl font-bold">Permissin Table</h1>
            <button
                class="block font-sans text-lg font-normal antialiased leading-normal text-slate-50 bg-green-600 px-4 py-2 rounded-md">
                <a href="{{ route('admin.permission.redirect.create.page') }}">Add Permission</a>
            </button>
        </div>
        <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-gray-200 bg-gray-900">
                            <p class="block font-sans text-lg font-bold antialiased leading-none text-slate-50 opacity-70">
                                ID
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200 bg-slate-900">
                            <p class="block font-sans text-lg font-bold antialiased leading-none text-slate-50 opacity-70">
                                Permission
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200 bg-slate-900">
                            <p class="block font-sans text-lg font-bold antialiased leading-none text-slate-50 opacity-70">
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($permissions) > 0)
                        @foreach ($permissions as $index => $permissions)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                        {{ $index + 1 }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                        {{ $permissions->name }}
                                    </p>
                                </td>
                                <td class="p-4 flex gap-2 border-b border-blue-gray-50">
                                    <button
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-slate-50 bg-green-600 px-4 py-2 rounded-md">
                                        <a href="{{ route('admin.permission.redirect.edit.page', $permissions->id) }}">Edit</a>
                                    </button>
                                    <form action="{{ route('admin.permission.delete', $permissions->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="block font-sans text-lg font-normal antialiased leading-normal text-slate-50 bg-red-600 px-4 py-2 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
