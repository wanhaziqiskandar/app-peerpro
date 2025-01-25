<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Main Content -->
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="flex space-x-8">
                <!-- Sidebar -->
                <div class="w-64 flex-shrink-0">
                    <div class="rounded-lg bg-white p-4 shadow">
                        <h2 class="mb-4 text-lg font-semibold">Filter</h2>
                        <form action="{{ route('tutors.index') }}" method="GET" id="filter-form">
                            <div class="space-y-2 mb-3">
                                <label for="subject-filter">Subjects</label>
                                <select id="subject-filter" name="subject"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    onchange="document.getElementById('filter-form').submit();">
                                    <option value="all" {{ old('subject', $subject) == 'all' ? 'selected' : '' }}>All
                                        Subjects</option>
                                    @foreach ($expertiseOptions as $expertise)
                                        <option value="{{ $expertise->id }}"
                                            {{ old('subject', $subject) == $expertise->id ? 'selected' : '' }}>
                                            {{ ucfirst($expertise->subject_name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="education-filter">Education Level</label>
                                <select id="education-filter" name="education"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    onchange="document.getElementById('filter-form').submit();">
                                    <option value="all" {{ old('education', $education) == 'all' ? 'selected' : '' }}>All Level</option>
                                    <option {{ old('education', $education) == 'secondary' ? 'selected' : '' }} value="secondary">Secondary School</option>
                                    <option {{ old('education', $education) == 'pre_u' ? 'selected' : '' }} value="pre_u">Pre-University</option>
                                    <option {{ old('education', $education) == 'diploma' ? 'selected' : '' }} value="diploma">Diploma</option>
                                    <option {{ old('education', $education) == 'degree' ? 'selected' : '' }} value="degree">Degree</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="flex-1">
                    <!-- Search Bar -->
                    <div class="mb-6">
                        <form action="{{ route('tutors.index') }}" method="GET" class="flex">
                            <input type="text" id="search" name="search" placeholder="Search tutors..."
                                value="{{ old('search', $search) }}"
                                class="flex-1 rounded-l-md border border-gray-300 p-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <button type="submit"
                                class="rounded-r-md bg-blue-600 px-6 py-2 text-white hover:bg-blue-700">
                                Search
                            </button>
                        </form>
                    </div>

                    <!-- Tutor Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @forelse ($tutors as $tutor)
                            <div class="rounded-lg bg-white p-6 shadow">
                                <div class="flex items-center">
                                    <div class="w-full">
                                        <h3 class="text-lg font-bold text-gray-800">
                                            Name: {{ $tutor->name }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                            <span class="text-gray-800 font-bold">Qualification:</span> {{ucfirst($tutor->qualifications) }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-800  font-bold">
                                            Expertise
                                        </p>
                                        <ul class="list-disc mt-1 text-sm text-gray-600 ml-4">
                                            @foreach ($tutor->expertise->whereNotNull('assessment_id') as $subject )
                                                <li>{{$subject->subject_detail->subject_name}}</li>
                                            @endforeach
                                        </ul>
                                        <p class="mt-2 text-right font-semibold text-gray-800">
                                            RM{{ number_format($tutor->price_rate, 2) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 space-y-3">
                                    <!-- Request and Chat Buttons -->
                                    <div class="flex gap-x-3">
                                        <a href="{{ route('tutors.create', $tutor->id) }}"
                                            class="flex-1 rounded-md bg-blue-600 py-2 text-center text-sm font-semibold text-white hover:bg-blue-700">
                                            Request
                                        </a>
                                        <form
                                            action="{{ route('chat.conversations.redirect', ['user_id' => $tutor->id]) }}"
                                            method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit"
                                                class="w-full rounded-md bg-green-600 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                                Chat
                                            </button>
                                        </form>
                                    </div>
                                    <!-- View Details Button -->
                                    <a href="{{ route('tutors.show', $tutor->id) }}"
                                        class="block w-full rounded-md bg-indigo-600 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-700">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-600">
                                No tutors found.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
