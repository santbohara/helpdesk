<div>
    <form wire:submit.prevent="submit">

        <div class="mb-6">
            <label for="group_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Group
            </label>
            <select id="menu_groups_id"
                wire:model="menu_groups_id" name="menu_groups_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                <option selected value=""></option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                @endforeach
            </select>
            @error('menu_groups_id')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="menu_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Menu Name
            </label>
            <input type="text" id="menu_title" wire:model="menu_title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
            @error('menu_title')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="route_prefix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Route Prefix
            </label>
            <input type="text" id="route_prefix"
                wire:model="route_prefix"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                @error('route_prefix')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
        </div>
        <div class="mb-6">
            <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Icon
            </label>
            <input type="text" id="icon" wire:model="icon"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
            @error('icon')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
            <p class="text-gray-600">Support: bootstrap icon</p>
        </div>
        <div class="mb-6">
            <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Order
            </label>
            <input type="number" id="order" wire:model="order"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
            @error('order')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Active
            </label>
            <select id="active"
                wire:model="active"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                <option value=""></option>
                <option value="1">True</option>
                <option value="0">False</option>
            </select>

            @error('active')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <span wire:target="submit" wire:loading.remove>Save</span>
            <span wire:target="submit" wire:loading>Saving...</span>
        </button>
    </form>
</div>
