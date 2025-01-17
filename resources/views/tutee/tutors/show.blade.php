<x-app-layout>
    <!-- Profile Centered -->
    <div class="mt-10 flex flex-col items-center gap-y-6 text-center">
        <div class="mb-6 shrink-0">
            {{-- Uncomment and update if you want to display the profile picture --}}
            {{-- <img class="rounded-full w-32 h-32 object-cover"
                src="https://images.unsplash.com/photo-1510706019500-d23a509eecd4?q=80&w=2667&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Avatar"> --}}
        </div>

        <div class="text-3xl font-semibold text-black">
            Name: {{ $tutor->name }}
        </div>

        <p class="text-lg text-gray-800">
            Age: {{ $tutor->age }}
        </p>
        <p class="text-lg text-gray-800">
            Experience: {{ $tutor->experience }}
        </p>
        <p class="text-lg text-gray-800">
            Qualification: {{ $tutor->qualifications }}
        </p>
        <p class="text-lg text-gray-800">
            Expertise
        </p>
        <ul class=" text-lg  text-gray-600">
            @foreach ($tutor->expertise as $subject )
            <li>{{$subject->subject_detail->subject_name}}</li>
            @endforeach
        </ul>

        <!-- Contact Information -->
        <div class="mt-6 flex flex-col items-center gap-y-4">
            <div class="flex items-center gap-x-3">
                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                </svg>
                <a href="mailto:{{ $tutor->email }}"
                    class="text-lg text-gray-600 underline hover:text-gray-800 dark:text-gray-300">
                    {{ $tutor->email }}
                </a>
            </div>

            <div class="flex items-center gap-x-3">
                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M14.1881 10.1624L22.7504 0H20.7214L13.2868 8.82385L7.34878 0H0.5L9.47944 13.3432L0.5 24H2.5291L10.3802 14.6817L16.6512 24H23.5L14.1881 10.1624ZM11.409 13.4608L3.26021 1.55962H6.37679L20.7224 22.5113H17.6058L11.409 13.4613V13.4608Z"
                        fill="currentColor" />
                </svg>
                <span class="text-lg text-gray-600">
                    Phone: {{ $tutor->phone_number }}
                </span>
            </div>

            <!-- Request and Chat Buttons -->
            <div class="mt-6 flex gap-x-6">
                <!-- Request Button -->
                <a href="{{ route('tutors.create', $tutor->id) }}"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-blue-700">
                    Request
                </a>
                <!-- Chat Button -->
                <a href="{{ route('chat.conversations.redirect', ['user_id' => $tutor->id]) }}"
                    class="inline-flex items-center justify-center rounded-lg bg-green-600 px-8 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-green-700">
                    Chat
                </a>
            </div>
        </div>
    </div>
    <!-- End Profile Centered -->
</x-app-layout>
