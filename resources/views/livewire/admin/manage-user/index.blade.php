<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Manage Users
        </div>

    </div>

    @include('alert')

    {{-- Body --}}
    <div class="my-3 w-auto">


        <div class="flex items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">

            {{-- Search Input --}}
            <div class="lg:w-1/4">

                <form class="flex items-center">

                    <label for="simple-search" class="sr-only">Search</label>

                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input wire:model="search" type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search Name" required="">
                    </div>

                </form>
            </div>

            @can('create')
                <x-btn-primary data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example"
                    data-drawer-placement="right" aria-controls="drawer-right-example" type="button">
                    <i class="bi bi-plus pr-2"></i>
                    Add User
                </x-btn-primary>

                <!-- Add Role component -->
                <div id="drawer-right-example"
                    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-right-label">

                    <h5 id="drawer-right-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        Add User
                    </h5>

                    <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="bi bi-x-lg"></i>
                        <span class="sr-only">Close</span>
                    </button>

                    @livewire('admin.manage-user.add-user')
                </div>
            @endcan
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md mb-3">
            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">SN</th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Name
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'name' ? 'text-indigo-500' : null }}" wire:click="sortBy('name')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Username
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'username' ? 'text-indigo-500' : null }}" wire:click="sortBy('username')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Email
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'email' ? 'text-indigo-500' : null }}" wire:click="sortBy('email')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Mobile
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'mobile' ? 'text-indigo-500' : null }}" wire:click="sortBy('mobile')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Role
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'role_id' ? 'text-indigo-500' : null }}" wire:click="sortBy('role_id')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Status
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'active' ? 'text-indigo-500' : null }}" wire:click="sortBy('active')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center gap-4">
                                    Last login
                                    <i class="bi bi-arrow-down-up hover:cursor-pointer {{ $sortBy === 'last_login' ? 'text-indigo-500' : null }}" wire:click="sortBy('last_login')"></i>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $user->name }}</td>
                                <td class="px-4 py-3">{{ $user->username }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">{{ $user->mobile }}</td>
                                <td class="px-4 py-3">
                                    @if ($user->username != 'admin')
                                        {{ $user->Role->name }}
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($user->active == true)
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Active</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Blocked</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $user->last_login }}</td>
                                <td class="px-4 py-3 flex justify-center">
                                    @can('edit')
                                            <a
                                                href="{{ route('edit.user',$user->id) }}"
                                                class="text-indigo-500"
                                                ><i class="bi bi-pencil-square"></i>
                                            </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-3" colspan="8">No data found!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        {{ $users->links() }}

    </div>

</div>
