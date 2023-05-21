<div>
    <form wire:submit.prevent="submit">

        <div class="mb-6">
            <x-input-label>Full Name</x-input-label>
            <x-text-input type="text" wire:model="name"></x-text-input>
            @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Email</x-input-label>
            <x-text-input type="text" wire:model="email" autocomplete="new-password"></x-text-input>
            @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-input-label>User Name</x-input-label>
            <x-text-input type="text" wire:model="username" autocomplete="new-password"></x-text-input>
            @error('username') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Mobile</x-input-label>
            <x-text-input type="text" wire:model="mobile"></x-text-input>
            @error('mobile') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Role</x-input-label>
            <select id="active"
                wire:model="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
                <option value=""></option>
               @foreach ($roles as $role)
                   <option value="{{ $role->id }}">{{ $role->name }}</option>
               @endforeach
            </select>
            @error('role') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <div>
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input type="checkbox" class="sr-only peer" wire:model="active">
                    <x-checkbox-default>Active</x-checkbox-default>
                </label>
            </div>
            @error('active') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <x-btn-primary type="submit">
            <span wire:target="submit" wire:loading.remove>Save</span>
            <span wire:target="submit" wire:loading>Saving...</span>
        </x-btn-primary>
    </form>
</div>
