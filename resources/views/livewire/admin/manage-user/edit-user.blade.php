<div>

    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Manage Users / Edit User
        </div>

    </div>

    {{-- Body --}}
    <div class="max-w-xl">

        @if($alert)
            @include('alert')
        @endif

        <div class="bg-white shadow-md sm:rounded-lg overflow-hidden my-3 p-4 dark:bg-gray-800 rounded-lg">
            <form wire:submit.prevent="submit">

                <div class="mb-6">
                    <x-input-label>Full Name</x-input-label>
                    <x-text-input type="text" wire:model="name"></x-text-input>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <x-input-label>Email</x-input-label>
                    <x-text-input type="text" wire:model="email" disabled></x-text-input>
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <x-input-label>User Name</x-input-label>
                    <x-text-input type="text" wire:model="username" disabled></x-text-input>
                    @error('username')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <x-input-label>Mobile</x-input-label>
                    <x-text-input type="text" wire:model="mobile" wire:dirty.class="border-red-500"></x-text-input>
                    @error('mobile')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <x-input-label>Password</x-input-label>
                    <x-text-input type="password" wire:model="password"></x-text-input>
                    <small>*Leave empty if not required to change</small>
                    <div>
                        <p class="underline">Rule:</p>
                        <ul>
                            <li>- Minimum 7 characters</li>
                            <li>- Should be alphanumeric</li>
                        </ul>
                    </div>
                    @error('password')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <x-input-label>Role</x-input-label>
                    <select wire:model="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        <option value=""></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" wire:key={{ $roleId }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <div>
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:model="active">
                            <x-checkbox-default>Active</x-checkbox-default>
                        </label>
                    </div>
                    @error('active')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                @if ($username != 'admin')
                    <div class="flex items-center space-x-2">
                        <x-btn-primary type="submit">
                            <span wire:target="submit" wire:loading.remove>Update</span>
                            <span wire:target="submit" wire:loading>Updating...</span>
                        </x-btn-primary>
                    </div>
                @else
                    <x-btn-primary type="button" class="bg-gray-500 hover:cursor-not-allowed hover:bg-gray-500" disabled>Update</x-btn-primary>
                @endif
            </form>
        </div>
    </div>
</div>
