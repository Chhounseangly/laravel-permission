<nav class=" w-full">
    <div class="py-2 px-3 bg-slate-100 rounded-md">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex gap-10 flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <h1 class="text-2xl font-bold">
                        <a href="{{ route('admin.index') }}">Admin</a>
                    </h1>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.index') }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-slate-800 hover:bg-gray-700 hover:text-white">Role</a>
                        <a href="{{ route('admin.permission.page') }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-slate-800 hover:bg-gray-700 hover:text-white">Permission</a>
                        <a href="{{route('admin.user.page')}}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-slate-800 hover:bg-gray-700 hover:text-white">User</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

            </div>
        </div>
    </div>
