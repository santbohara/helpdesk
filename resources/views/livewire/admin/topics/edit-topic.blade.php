<div>
    {{-- Breadcrumb --}}
    <div class="breadcrumb flex flex-row justify-between ">

        {{-- Left navigation info --}}
        <div class="flex text-xs text-gray-500 items-center">
            <i class="bi bi-house mr-1"></i> Home / Topics / Edit
        </div>

        {{-- Right Quick Action --}}

    </div>

    <div class="max-w-xl">

        @include('alert')

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden mb-6 my-3">

            <div class="py-4 px-2 w-full">
                <form wire:submit.prevent="update">

                    <div class="mb-6">
                        <x-input-label>Title</x-input-label>
                        <x-text-input type="text" wire:model="title"></x-text-input>
                        @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <x-input-label>Slug</x-input-label>
                        <x-text-input type="text" wire:model="slug" value="{{ $slug }}" placeholder="{{ $slug }}"></x-text-input>
                        @error('slug') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <x-input-label>Title Unicode</x-input-label>
                        <x-text-input type="text" wire:model="title_unicode"></x-text-input>
                        @error('title_unicode') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <x-input-label>Description</x-input-label>
                        <x-text-input type="text" wire:model="desc"></x-text-input>
                        @error('desc') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <x-input-label>Description Unicode</x-input-label>
                        <x-text-input type="text" wire:model="desc_unicode"></x-text-input>
                        @error('desc_unicode') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <div class="grow">
                            <x-input-label>Icon</x-input-label>
                            <x-file-input type="file" wire:model="icon"></x-file-input>
                            <div wire:loading wire:target="icon" class="text-indigo-500">Uploading...</div>
                            <small>Supported Format : jpg/jpeg | Max file size: 500KB</small>
                        </div>
                        @error('icon') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
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

                    @can('edit')
                        <x-btn-primary type="submit">
                            <span wire:target="update" wire:loading.remove>Update</span>
                            <span wire:target="update" wire:loading>Updating...</span>
                        </x-btn-primary>
                    @endcan
                </form>
            </div>
        </div>

        @can('delete')
            <div class="flex justify-end">
                <button type="button"
                    data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                    class="text-red-500">
                    <i class="bi bi-trash-fill"></i>
                    <span wire:target="delete" wire:loading.remove>Delete</span>
                    <span wire:target="delete" wire:loading>Deleting...</span>
                </button>
            </div>

            @include('livewire.admin.topics.delete-modal')
        @endcan

    </div>
</div>
