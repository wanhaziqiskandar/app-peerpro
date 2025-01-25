<x-guest-layout>
    <!-- Add custom styling for smaller form and larger logo -->
    <h2 class="text-xl font-semibold text-gray-700 mb-2 text-center">Register your account</h2>
        
    <div class="mx-auto max-w-lg px-4 py-6">
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div>
                <x-input-label for="lastname" :value="__('Last Name')" />
                <x-text-input id="lastname"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div>
                <x-input-label for="gender" :value="__('Gender')" />
                <div class="mt-1 space-x-6">
                    <label class="inline-flex items-center text-gray-700">
                        <input type="radio" id="gender" name="gender" value="male" class="form-radio"
                            required />
                        <span class="ml-2">{{ __('Male') }}</span>
                    </label>
                    <label class="inline-flex items-center text-gray-700">
                        <input type="radio" id="gender" name="gender" value="female" class="form-radio"
                            required />
                        <span class="ml-2">{{ __('Female') }}</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Age -->
            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="number" name="age" :value="old('age')" required autocomplete="age" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone_number" :value="__('Phone')" />
                <x-text-input id="phone_number"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="text" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <!-- Role -->
            <div>
                <x-input-label for="role" :value="__('Role')" />
                <div class="mt-1 space-x-6">
                    <label class="inline-flex items-center text-gray-700">
                        <input type="radio" id="tuteeRole" name="role" value="tutee" class="form-radio"
                            onclick="toggleAdditionalFields()" required />
                        <span class="ml-2">{{ __('Tutee') }}</span>
                    </label>
                    <label class="inline-flex items-center text-gray-700">
                        <input type="radio" id="tutorRole" name="role" value="tutor" class="form-radio"
                            onclick="toggleAdditionalFields()" required />
                        <span class="ml-2">{{ __('Tutor') }}</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- Additional Fields for Tutor -->
            <div id="additionalFields" class="mt-4 hidden space-y-4">
                <!-- Experience -->
                <div>
                    <x-input-label for="experience" :value="__('Experience')" />
                    <select id="experience" name="experience"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" disabled selected>{{ __('Select your experience') }}</option>
                        <option value="Less than 1 year">{{ __('Less than 1 year') }}</option>
                        <option value="1 year">{{ __('1 year') }}</option>
                        <option value="2 years">{{ __('2 years') }}</option>
                        <option value="3 years">{{ __('3 years') }}</option>
                        <option value="More than 3 years">{{ __('More than 3 years') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="expertise" :value="__('Expertise')" />
                    <select id="expertise" name="expertise[]"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        multiple>
                        @foreach ($subjects as $subject)
                            @php
                                switch ($subject->subject_level) {
                                    case 'secondary':
                                        $level = 'Secondary';
                                        break;
                                    case 'pre_u':
                                        $level = 'Pre-University';
                                        break;
                                    case 'diploma':
                                        $level = 'Diploma';
                                        break;
                                    case 'degree':
                                        $level = 'Degree';
                                        break;
                                    default:
                                        $level = '';
                                }
                            @endphp
                            <option value="{{ $subject->id }}" @if (in_array($subject->id, old('expertise', []))) selected @endif>
                                {{ $subject->subject_name }} ({{ $level }})
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('expertise')" class="mt-2" />
                </div>

                <!-- Account Number -->
                <div>
                    <x-input-label for="account_number" :value="__('Account Number')" />
                    <x-text-input id="account_number"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        type="text" name="account_number" :value="old('account_number')" />
                    <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
                </div>

                <!-- Qualification -->
                <div>
                    <x-input-label for="qualifications" :value="__('Qualification')" />
                    <select id="qualifications" name="qualifications"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" disabled selected>{{ __('Select Qualification') }}</option>
                        <option value="secondary" {{ old('qualifications') == 'secondary' ? 'selected' : '' }}>
                            {{ __('Secondary School') }}
                        </option>
                        <option value="pre_u" {{ old('qualifications') == 'pre_u' ? 'selected' : '' }}>
                            {{ __('Pre-University') }}
                        </option>
                        <option value="diploma" {{ old('qualifications') == 'diploma' ? 'selected' : '' }}>
                            {{ __('Diploma') }}
                        </option>
                        <option value="degree" {{ old('qualifications') == 'degree' ? 'selected' : '' }}>
                            {{ __('Degree') }}
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                </div>

                <!-- Rate -->
                <div>
                    <x-input-label for="price_rate" :value="__('Rate')" />
                    <x-text-input id="price_rate"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        type="text" name="price_rate" :value="old('price_rate')" />
                    <x-input-error :messages="$errors->get('price_rate')" class="mt-2" />
                </div>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="mt-4 flex items-center justify-between">
                <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button>{{ __('Register') }}</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        function toggleAdditionalFields() {
            const additionalFields = document.getElementById('additionalFields');
            const selectedRole = document.querySelector('input[name="role"]:checked').value;

            // Show or hide additional fields based on selected role
            if (selectedRole === 'tutor') {
                additionalFields.classList.remove('hidden');
            } else {
                additionalFields.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
