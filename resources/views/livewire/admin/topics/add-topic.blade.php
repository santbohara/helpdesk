<div>
    <form wire:submit.prevent="add">

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

        <x-btn-primary type="submit">
            <span wire:target="add" wire:loading.remove>Save</span>
            <span wire:target="add" wire:loading>Saving...</span>
        </x-btn-primary>
    </form>
</div>
