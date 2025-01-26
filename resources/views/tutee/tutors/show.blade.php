<x-app-layout>
    <div class="container mx-auto py-12">
        <div class="mx-auto max-w-2xl rounded-lg border border-gray-200 bg-white p-8 shadow-md">
            <h2 class="mb-8 text-center text-3xl font-bold text-gray-900">Tutor Details</h2>

            <div class="space-y-6">
                <!-- Tutor Details -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Name</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">{{ $tutor->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Last Name</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">{{ $tutor->lastname }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Age</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">{{ $tutor->age }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Experience</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">{{ $tutor->experience }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Qualification</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">
                            {{ ucfirst($tutor->qualifications) }}
                        </p>
                    </div>
                </div>

                <!-- Expertise -->
                <div>
                    <label class="block text-sm font-medium text-gray-600">Expertise</label>
                    <div class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">
                        <ul class="list-inside list-disc text-gray-700">
                            @foreach ($tutor->expertise as $subject)
                                <li>{{ $subject->subject_detail->subject_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">
                            <a href="mailto:{{ $tutor->email }}" class="text-blue-600 hover:underline">
                                {{ $tutor->email }}
                            </a>
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Phone Number</label>
                        <p class="mt-1 rounded-md border border-gray-300 bg-gray-100 px-4 py-2">
                            {{ $tutor->phone_number }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-center gap-4">
                    <a href="{{ route('tutors.create', $tutor->id) }}"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-blue-700">
                        Request
                    </a>
                    <a href="{{ route('chat.conversations.redirect', ['user_id' => $tutor->id]) }}"
                        class="inline-flex items-center justify-center rounded-lg bg-green-600 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-green-700">
                        Chat
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
