@extends('layouts.app')

@section('title', 'User')
@section('content')
    <div class="w-full">
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
                                Role
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200 bg-slate-900">
                            <p class="block font-sans text-lg font-bold antialiased leading-none text-slate-50 opacity-70">
                                Name
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200 bg-slate-900">
                            <p class="block font-sans text-lg font-bold antialiased leading-none text-slate-50 opacity-70">
                                Email
                            </p>
                        </th>
                        <th class="p-4 border-b border-gray-200 bg-slate-900">
                            <p class="block font-sans text-lg font-bold antialiased leading-none text-slate-50 opacity-70">
                                Verified
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
                    @if (count($users) > 0)
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                        {{ $index + 1 }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    @foreach ($user->roles as $role)
                                        <p
                                            class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                            {{ $role->name }}
                                        </p>
                                    @endforeach
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                        {{ $user->name }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                        {{ $user->email }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-lg uppercase font-normal antialiased leading-normal text-blue-gray-900">
                                        {{ $user->email_verified_at ? 'ture' : 'false' }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="grid grid-cols-2">
                                        @foreach ($user->getDirectPermissions() as $permission)
                                        {{ $permission->name }}<br>
                                    @endforeach
                                        {{-- @foreach ($user->roles as $role)
                                            @foreach ($role->permissions as $permission)
                                                @if ($permission)
                                                    <p
                                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                                        {{ $permission->name }}
                                                    </p>
                                                @else
                                                    <p
                                                        class="block font-sans text-lg font-normal antialiased leading-normal text-blue-gray-900">
                                                        Permission not yet assign.
                                                    </p>
                                                @endif
                                            @endforeach
                                        @endforeach --}}
                                    </div>
                                </td>
                                <td class="p-4 flex gap-2 border-b border-blue-gray-50">
                                    <button
                                        class="block font-sans text-lg font-normal antialiased leading-normal text-slate-50 bg-green-600 px-4 py-2 rounded-md">
                                        <a href="{{ route('admin.user.redirect.assign.user.permission.page', $user->id) }}">Manage
                                            Permission</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <button
                            class="block font-sans text-lg font-normal antialiased leading-normal text-slate-50 bg-green-600 px-4 py-2 rounded-md">
                            <a href="{{ route('admin.user.redirect.create.page') }}">Add Role</a>
                        </button>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
