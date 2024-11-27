<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="lastname" :value="__('Last Name')" />
            <x-text-input id="lastname" class="mt-1 block w-full" type="text" name="lastname" :value="old('lastname')"
                required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" :value="__('Gender')" class="text-white" />
            <div class="mt-1 block">
                <label class="inline-flex items-center text-white">
                    <input type="radio" id="gender" name="gender" value="male" class="form-radio" required />
                    <span class="ml-2">{{ __('Male') }}</span>
                </label>
                <label class="ml-6 inline-flex items-center text-white">
                    <input type="radio" id="gender" name="gender" value="female" class="form-radio" required />
                    <span class="ml-2">{{ __('Female') }}</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="mt-1 block w-full" type="number" name="age" :value="old('age')"
                required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone')" />
            <x-text-input id="phone_number" class="mt-1 block w-full" type="text" name="phone_number"
                :value="old('phone_number')" required autofocus autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" class="text-white" />
            <div class="mt-1 block">
                <label class="inline-flex items-center text-white">
                    <input type="radio" id="tutee" name="role" value="tutee" class="form-radio"
                        onclick="toggleAdditionalFields()" required />
                    <span class="ml-2">{{ __('Tutee') }}</span>
                </label>
                <label class="ml-6 inline-flex items-center text-white">
                    <input type="radio" id="tutor" name="role" value="tutor" class="form-radio"
                        onclick="toggleAdditionalFields()" required />
                    <span class="ml-2">{{ __('Tutor') }}</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Additional Fields for Tutor -->
        <div id="additionalFields" class="mt-4" style="display: none;">
            <!-- Experience -->
            <div>
                <x-input-label for="experience" :value="__('Experience')" />
                <x-text-input id="experience" class="mt-1 block w-full" type="text" name="experience"
                    :value="old('experience')" />
                <x-input-error :messages="$errors->get('experience')" class="mt-2" />
            </div>

            <!-- Expertise -->
            <div class="mt-4">
                <x-input-label for="expertise" :value="__('Expertise')" />
                <x-text-input id="expertise" class="mt-1 block w-full" type="text" name="expertise"
                    :value="old('expertise')" />
                <x-input-error :messages="$errors->get('expertise')" class="mt-2" />
            </div>

            <!-- Account Number -->
            <div class="mt-4">
                <x-input-label for="account_number" :value="__('Account Number')" />
                <x-text-input id="account_number" class="mt-1 block w-full" type="text" name="account_number"
                    :value="old('account_number')" />
                <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
            </div>

            <!-- Qualification -->
            <div class="mt-4">
                <x-input-label for="qualifications" :value="__('Qualification')" />
                <x-text-input id="qualifications" class="mt-1 block w-full" type="text" name="qualifications"
                    :value="old('qualifications')" />
                <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
            </div>

            <!-- Rate -->
            <div class="mt-4">
                <x-input-label for="price_rate" :value="__('Rate')" />
                <x-text-input id="price_rate" class="mt-1 block w-full" type="text" name="price_rate"
                    :value="old('price_rate')" />
                <x-input-error :messages="$errors->get('price_rate')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleAdditionalFields() {
            const role = document.querySelector('input[name="role"]:checked').value;
            const additionalFields = document.getElementById('additionalFields');
            if (role === 'tutor') {
                additionalFields.style.display = 'block';
            } else {
                additionalFields.style.display = 'none';
            }
        }
    </script>
</x-guest-layout>
