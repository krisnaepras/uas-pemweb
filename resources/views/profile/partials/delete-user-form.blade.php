
<section class="space-y-6 font-poppins bg-green-800 p-6 rounded-lg shadow-lg">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Delete Your Account?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-100">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white shadow-lg rounded-lg">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-white">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border-green-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-lg"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>