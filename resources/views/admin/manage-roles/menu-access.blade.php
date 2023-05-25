<x-app-layout>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Manage Roles / Menu Access
        </div>

        {{-- Right Quick Action --}}
        <div>
            <a href="{{ route('ManageRolesController@index') }}" class="hover:text-indigo-500">
                <i class="bi bi-arrow-return-left"></i> Go Back
            </a>
        </div>

    </div>

    @include('alert')


    {{-- Body --}}

    <form action="{{ route('MenuAccessController@menuAccessUpdate',$role->id) }}" method="post">
        @csrf

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden mb-3">

            <div class="flex items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                <p class="text-gray-700 dark:text-gray-400">
                    <i class="bi bi-info-circle-fill"></i> Manage Menu Access for Role:
                    <span class="font-bold">{{ $role->name }}</span>
                </p>

            </div>

            <div class="overflow-x-auto pb-6">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-2">
                                Menu Group
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Menu Name
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @inject('Access', 'App\Http\Controllers\Admin\ManageRoles\MenuAccessController')

                        @foreach ($menuGroup as $row)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 pt-3">
                                    {{ $row->title }}

                                </td>
                                <td class="px-6 pt-3">
                                    <a href="javascript:void(0);" class="text-indigo-500 select-all-btn" data-class="select-{{ $row->id }}">
                                        <small>Select All</small>
                                    </a>
                                    @foreach ($row->menus as $item)
                                        <div class="flex items-center mb-3">
                                            <input id="checkbox-{{ $item->id }}" type="checkbox" name="menu_id[]"
                                                value="{{ $item->id }}"
                                                class="select-{{ $row->id }} w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded
                                                focus:ring-indigo-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                @if ($Access->RoleMenuAccess($item->id)) checked @endif
                                                >
                                            <label for="checkbox-{{ $item->id }}"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                {{ $item->menu_title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <x-btn-primary type="submit">Update</x-btn-primary>
    </form>


    <script type="module">
        $(document).ready(function() {
            $("form").submit(function() {
                $btn = '.btn-loading';
                $($btn).html(
                    `Processing...`
                );
            });
        });
    </script>

    <script type="module">
        $('.select-all-btn').click(function() {
        var $this = $(this),
            checked = !$this.data('checked');
        $('.' + $this.data('class')).not(':disabled').prop('checked', checked);
        $this.data('checked', checked)
        });
    </script>

</x-app-layout>
