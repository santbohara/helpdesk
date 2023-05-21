<div>
    <div class="max-w-3xl bg-white dark:bg-gray-800 relative shadow-md mb-6">

        <div class="py-4 px-2 w-full">
            <h2 class="mb-4 font-semibold text-gray-900 dark:text-white">
                <i class="bi bi-three-dots-vertical"></i>
                Email Settings
            </h2>

            <div class="px-2 w-full">
                <form action="#">
                    <div class="flex gap-4 mt-3">
                        <div class="grow">
                            <x-input-label>Auto Email's Sender</x-input-label>
                            <x-text-input type="email"></x-text-input>
                        </div>
                        <div>
                            <x-btn-primary type="submit" class="mt-8">Update</x-btn-primary>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-3">
                        <div class="grow">
                            <x-input-label>Admin's Notification Email</x-input-label>
                            <x-text-input type="email"></x-text-input>
                        </div>
                        <div>
                            <x-btn-primary type="submit" class="mt-8">Update</x-btn-primary>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
