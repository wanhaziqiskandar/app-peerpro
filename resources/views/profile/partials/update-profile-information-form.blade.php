<section>
    <header>
        <h2 class="text-lg font-medium text-black dark:text-black">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-black dark:text-black">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" value="{{ old('name', $user->name) }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!--Lastname-->
        <div>
            <x-input-label for="lastname" :value="__('Last Name')" />
            <x-text-input id="lastname" class="mt-1 block w-full" type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" required />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" value="{{ old('email', $user->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <div class="mt-1 space-x-6">
                <label class="inline-flex items-center text-gray-700">
                    <input type="radio" id="gender" name="gender" value="male" class="form-radio"
                    {{$user->gender == 'male' ? 'checked' :''}}
                        required />
                    <span class="ml-2">{{ __('Male') }}</span>
                </label>
                <label class="inline-flex items-center text-gray-700">
                    <input type="radio" id="gender" name="gender" value="female" class="form-radio"
                    {{$user->gender == 'female' ? 'checked' :''}}

                        required />
                    <span class="ml-2">{{ __('Female') }}</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="mt-1 block w-full" type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
