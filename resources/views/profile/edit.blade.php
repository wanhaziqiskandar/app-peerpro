<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <!-- Update Profile Information -->
            <div class="bg-gray-50 p-4 shadow sm:rounded-lg sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Additional Information (Visible only for tutors) -->
            @if (auth()->user()->isTutor())
                <div class="bg-gray-50 p-4 shadow sm:rounded-lg sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.additional-info')
                    </div>
                </div>
            @endif

            <!-- Update Password -->
            <div class="bg-gray-50 p-4 shadow sm:rounded-lg sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="bg-gray-50 p-4 shadow sm:rounded-lg sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
