<div>
    <form wire:submit.prevent="submit">

        <div class="mb-6">
            <x-input-label>Role Name</x-input-label>
            <x-text-input type="text" wire:model="role_name"></x-text-input>
            @error('role_name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Select Permissions</x-input-label>
            @foreach ($permissions as $row)
                <div class="flex items-center mb-4">
                    <input id="checkbox-{{ $row->id }}" type="checkbox" wire:model="permission"
                        value="{{ $row->name }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded
                        focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        >
                    <label for="checkbox-{{ $row->id }}"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ $row->name }}
                    </label>
                </div>
            @endforeach
            @error('permission')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <x-btn-primary type="submit">
            <span wire:target="submit" wire:loading.remove>Save</span>
            <span wire:target="submit" wire:loading>Saving...</span>
        </x-btn-primary>
    </form>
</div>
