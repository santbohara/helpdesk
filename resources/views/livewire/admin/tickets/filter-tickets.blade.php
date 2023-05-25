<div>

    <form wire:submit.prevent="filter">

        <div class="mb-6">
            <x-input-label>Topic</x-input-label>
            <select
                wire:model.defer="topic_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                >
                <option value=""></option>
                @foreach ($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                @endforeach
            </select>
            @error('title')
                <span class="text-sm text-red-500"></span>
            @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Ticket ID</x-input-label>
            <x-text-input type="text" wire:model.defer="ticket_id"></x-text-input>
            @error('title')
                <span class="text-sm text-red-500"></span>
            @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Account Number</x-input-label>
            <x-text-input type="text" wire:model.defer="account_number"></x-text-input>
            @error('title')
                <span class="text-sm text-red-500"></span>
            @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Mobile</x-input-label>
            <x-text-input type="text" wire:model.defer="mobile"></x-text-input>
            @error('title')
                <span class="text-sm text-red-500"></span>
            @enderror
        </div>

        <div class="mb-6">
            <x-input-label>Status</x-input-label>
            <select
                wire:model.defer="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                >
                <option value=""></option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
            @error('title')
                <span class="text-sm text-red-500"></span>
            @enderror
        </div>

        <div class="grid grid-cols-2 space-x-2">

            <div class="mb-6">
                <x-input-label>Date From</x-input-label>
                <x-text-input type="date" wire:model.defer="created_date_from"></x-text-input>
                @error('title')
                    <span class="text-sm text-red-500"></span>
                @enderror
            </div>

            <div class="mb-6">
                <x-input-label>Date To</x-input-label>
                <x-text-input type="date" wire:model.defer="created_date_to"></x-text-input>
                @error('title')
                    <span class="text-sm text-red-500"></span>
                @enderror
            </div>
        </div>

        <x-btn-primary type="submit" wire:click="filter">
            <span>Filter</span>
        </x-btn-primary>

    </form>
</div>
