<div>
    <div class="max-w-3xl bg-white dark:bg-gray-800 relative shadow-md mb-6">

        <div class="py-4 px-2 w-full">
            <h2 class="mb-4 font-semibold text-gray-900 dark:text-white">
                <i class="bi bi-three-dots-vertical"></i>
                General Details
            </h2>

            <div class="px-2 w-full">
                <form action="#">
                    <div class="flex gap-4 mt-3">
                        <div class="grow">
                            <x-input-label>Site Title</x-input-label>
                            <x-text-input type="text"></x-text-input>
                        </div>
                        <div>
                            <x-btn-primary type="submit" class="mt-8">Update</x-btn-primary>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-3">
                        <div class="grow">
                            <x-input-label>Site Logo</x-input-label>
                            <x-file-input type="file"></x-file-input>
                            <small>Supported Format : jpg/jpeg | Max file size: 500KB</small>
                        </div>
                        <div>
                            <x-btn-primary type="submit" class="mt-8">Upload</x-btn-primary>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
