<x-app-layout>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Manage Roles
        </div>

    </div>

    @include('alert')

    {{-- Body --}}

    <div class="flex items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
        <p class="text-gray-700 dark:text-gray-400"> <i class="bi bi-list"></i> List of Roles</p>

        @can('create')

            <x-btn-primary data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example"
                    data-drawer-placement="right" aria-controls="drawer-right-example" type="button">
                <i class="bi bi-plus pr-2"></i>
                Add Role
            </x-btn-primary>

            <!-- Add Role component -->
            <div id="drawer-right-example"
                class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-right-label">

                <h5 id="drawer-right-label"
                    class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    Add Role
                </h5>

                <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <i class="bi bi-x-lg"></i>
                    <span class="sr-only">Close</span>
                </button>

                @livewire('admin.manage-roles.create-role')
            </div>
        @endcan

    </div>

    <div class="bg-white dark:bg-gray-800 relative shadow-md">
        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Menu Access
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Permission
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Added Date
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $row)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row" class="px-4 py-3">
                                {{ $row->name }}
                            </td>
                            <td class="px-4 py-3">
                                @if($row->name != 'Admin')
                                    @can('edit')
                                        <a href="{{ route('MenuAccessController@index',$row->id) }}" class="text-blue-500 hover:underline">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    @endcan
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($row->name != 'Admin')
                                    @can('edit')
                                        <a href="#" data-drawer-target="edit-permission"
                                            data-drawer-show="edit-permission" data-drawer-placement="right"
                                            aria-controls="edit-permission" class="text-blue-500 hover:underline editPermission"
                                            data-id="{{ $row->id }}">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    @endcan
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($row->name != 'Admin') {{ $row->created_at }} @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @can('edit')
        <!-- Edit Permission component -->
        <div id="edit-permission"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="edit-permission-label">

            <h5 id="edit-permission-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Edit Permission
            </h5>

            <button type="button" data-drawer-hide="edit-permission" aria-controls="edit-permission"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5
            absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <i class="bi bi-x-lg"></i>
                <span class="sr-only">Close</span>
            </button>

            <div class="loading" style="display: none">
                <x-loading></x-loading>
            </div>

            <div id="load"></div>

        </div>

        <script type="module">
            $(document).ready(function() {

                $(".editPermission").click(function() {

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('ManageRolesController@permissionDetails') }}",
                        data: {
                            id: $(this).attr('data-id'),
                            _token: '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            $(".loading").show();
                            $("#load").hide();
                            $(".navbar-collapse").removeClass('show');
                        },
                        complete: function() {
                            $(".loading").hide();
                            $("#load").show();
                        },
                        success: function(data) {
                            $("#load").html(data.view);
                        },
                        error: function(xhr, type, exception) {
                            alert("ajax error response type " + type);
                        }
                    });
                });

                $('.navbar-toggler').click(function(){
                    if($(".navbar-collapse").hasClass('show')){
                        $(".navbar-collapse").removeClass('show');
                    }
                });
            });
        </script>
    @endcan

</x-app-layout>
