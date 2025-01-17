<section>
    <header>
        <h2 class="text-lg font-medium text-black dark:text-black">
            {{ __('Additional Information') }}
        </h2>

        <p class="mt-1 text-sm text-black dark:text-black">
            {{ __("Update your account's additional information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Role (Hidden) -->
        <input type="hidden" name="role" value="{{ $user->role }}" />

        <!-- Conditional Fields for Tutor -->
        @if ($user->role === 'tutor')
            <!-- Experience -->
            <div>
                <x-input-label for="experience" :value="__('Experience')" />
                <select id="experience" name="experience" class="mt-1 block w-full">
                    <option value="Less than 1 year"
                        {{ old('experience', $user->experience) == 'Less than 1 year' ? 'selected' : '' }}>
                        {{ __('Less than 1 year') }}</option>
                    <option value="1 year" {{ old('experience', $user->experience) == '1 year' ? 'selected' : '' }}>
                        {{ __('1 year') }}</option>
                    <option value="2 years" {{ old('experience', $user->experience) == '2 years' ? 'selected' : '' }}>
                        {{ __('2 years') }}</option>
                    <option value="3 years" {{ old('experience', $user->experience) == '3 years' ? 'selected' : '' }}>
                        {{ __('3 years') }}</option>
                    <option value="More than 3 years"
                        {{ old('experience', $user->experience) == 'More than 3 years' ? 'selected' : '' }}>
                        {{ __('More than 3 years') }}</option>
                </select>
                <x-input-error :messages="$errors->get('experience')" class="mt-2" />
            </div>
{{-- 
            <!-- Expertise -->
                <div class="mt-4">
                    <x-input-label for="expertise" :value="__('Expertise')" />
                    <select id="expertise" name="expertise[]" class="mt-1 block w-full" multiple>
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
                            <option value="{{ $subject->id }}"
                                {{ in_array($subject->id, old('expertise', $user->expertise->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $subject->subject_name }} ({{ $level }})
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('expertise')" class="mt-2" />
                </div> --}}
                

            <!-- Account Number -->
            <div class="mt-4">
                <x-input-label for="account_number" :value="__('Account Number')" />
                <x-text-input id="account_number" class="mt-1 block w-full" type="text" name="account_number"
                    :value="old('account_number', $user->account_number)" />
                <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
            </div>

            <!-- Qualification -->
            <div class="mt-4">
                <x-input-label for="qualifications" :value="__('Qualification')" />
                <select id="qualifications" name="qualifications" class="mt-1 block w-full">
                    <option value="secondary"
                        {{ old('qualifications', $user->qualifications) == 'secondary' ? 'selected' : '' }}>
                        {{ __('Secondary School') }}
                    </option>
                    <option value="pre_u"
                        {{ old('qualifications', $user->qualifications) == 'pre_u' ? 'selected' : '' }}>
                        {{ __('Pre University') }}
                    </option>
                    <option value="diploma"
                        {{ old('qualifications', $user->qualifications) == 'diploma' ? 'selected' : '' }}>
                        {{ __('Diploma') }}
                    </option>
                    <option value="degree"
                        {{ old('qualifications', $user->qualifications) == 'degree' ? 'selected' : '' }}>
                        {{ __('Degree') }}
                    </option>
                </select>
                <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
            </div>

            <!-- Rate -->
            <div class="mt-4">
                <x-input-label for="price_rate" :value="__('Rate')" />
                <x-text-input id="price_rate" class="mt-1 block w-full" type="text" name="price_rate"
                    :value="old('price_rate', $user->price_rate)" />
                <x-input-error :messages="$errors->get('price_rate')" class="mt-2" />
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>