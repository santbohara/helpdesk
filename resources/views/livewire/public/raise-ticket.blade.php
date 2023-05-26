<div>
    <form wire:submit.prevent="submit" class="border p-6 rounded-md shadow-md">

        @if (session()->has('success'))
            <div class="bg-teal-100 border border-t-4 mb-6 border-teal-500 rounded text-teal-900 px-4 py-3"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="bi bi-check-circle text-lg mr-3 text-teal-900"></i>
                    </div>
                    <div>
                        <p class="font-bold">{{ __('raise-ticket.ticket_success') }} {{ session('success') }}</p>
                        <p class="text-sm">{{ __('raise-ticket.ticket_success_info') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session()->has('fail'))
            <div class="bg-red-100 border border-t-4 mb-6 border-red-500 rounded text-red-900 px-4 py-3" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="bi bi-x-circle text-lg mr-3 text-red-900"></i>
                    </div>
                    <div>
                        <p class="font-bold">Failed to submit Ticket</p>
                        <p class="text-sm">Try again, or contact bank for support.</p>
                    </div>
                </div>
            </div>
        @endif

        <p class="text-gray-500 mb-3 text-sm">{{ __('raise-ticket.feilds_required') }}</p>

        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="your_name" id="your_name" wire:model="your_name"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2
                border-gray-300 appearance-none
                focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="your_name"
                class="peer-focus:font-medium absolute text-sm
                text-gray-500 duration-300
                transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0
                peer-focus:text-blue-600 peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                {{ __('raise-ticket.your_name') }}
            </label>
            @error('your_name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="account_number" id="account_number" wire:model="account_number"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2
                border-gray-300 appearance-none
                focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="account_number"
                class="peer-focus:font-medium absolute text-sm text-gray-500             duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0
                peer-focus:text-blue-600 peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6">
                {{ __('raise-ticket.account_number') }}
            </label>
            @error('account_number')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="tel" name="mobile_number" id="mobile_number" wire:model="mobile_number"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                    border-0 border-b-2 border-gray-300 appearance-none
                focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="mobile_number"
                    class="peer-focus:font-medium absolute text-sm text-gray-500                 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0
                    peer-focus:text-blue-600 peer-placeholder-shown:scale-100
                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    {{ __('raise-ticket.mobile_number') }}
                </label>
                @error('mobile_number')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <input type="email" name="email" id="email" wire:model="email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                    border-0 border-b-2 border-gray-300 appearance-none
                    focus:outline-none focus:ring-0
                    focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500
                    duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                    peer-focus:left-0 peer-focus:text-blue-600                 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                    peer-focus:-translate-y-6">
                    {{ __('raise-ticket.email') }}
                </label>
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <label for="topic" class="sr-only">{{ __('raise-ticket.choose_topic') }}</label>
            <select id="topic" name="topic" wire:model="topic"
                class="block py-2.5 px-1 w-full text-sm text-gray-500 bg-transparent
                border-0 border-b-2 border-gray-200 appearance-none
                focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="" selected>{{ __('raise-ticket.choose_topic') }}</option>
                @forelse ($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                @empty
                    <option value="">Error loading topics...</option>
                @endforelse
            </select>
            @error('topic')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="subject" id="subject" wire:model="subject"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                border-0 border-b-2 border-gray-300 appearance-none
                focus:outline-none focus:ring-0
                focus:border-blue-600 peer"
                placeholder=" " />
            <label for="subject"
                class="peer-focus:font-medium absolute text-sm text-gray-500             duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0
                peer-focus:text-blue-600 peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                {{ __('raise-ticket.subject') }}
            </label>
            @error('subject')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <textarea name="description" id="description" wire:model="description"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                border-0 border-b-2 border-gray-300 appearance-none
                focus:outline-none focus:ring-0
                focus:border-blue-600 peer"
                placeholder=" " rows="6"></textarea>
            <label for="description"
                class="peer-focus:font-medium absolute text-sm text-gray-500             duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0
                peer-focus:text-blue-600 peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                {{ __('raise-ticket.description') }}
            </label>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle' data-action='submit'
            class="g-recaptcha text-white bg-indigo-700 hover:bg-indigo-800
            focus:ring-4 focus:outline-none focus:ring-blue-300
            font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5
            text-center">
            <span wire:target="submit" wire:loading.remove>{{ __('raise-ticket.submit') }}</span>
            <span wire:target="submit" wire:loading>{{ __('raise-ticket.submitting') }}</span>
        </button>
    </form>

    <script type="module" src="https://www.google.com/recaptcha/api.js?render={{env('CAPTCHA_SITE_KEY')}}"></script>
    <script type="module">
        function handle(e) {
            grecaptcha.ready(function () {
                grecaptcha.execute('{{env('CAPTCHA_SITE_KEY')}}', {action: 'submit'})
                    .then(function (token) {
                        @this.set('captcha', token);
                    });
            })
        }
    </script>

</div>
