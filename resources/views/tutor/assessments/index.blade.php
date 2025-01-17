<x-app-layout>
    <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="inline-block min-w-full p-1.5 align-middle">
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg">
                        <!-- Header -->
                        <div
                            class="grid gap-3 border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-black">
                                    Your Subjects
                                </h2>
                                <p class="text-sm text-black">
                                    View and manage your assessments
                                </p>
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="border-b border-gray-200 px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-black">
                                            #
                                        </span>
                                    </th>
                                    <th scope="col" class="border-b border-gray-200 px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-black">
                                            Subjects Title
                                        </span>
                                    </th>
                                    <th scope="col" class="border-b border-gray-200 px-6 py-3 text-end">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-black">
                                            Actions
                                        </span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-3">
                                            <span class="text-sm text-black">{{ $index++ }}</span>
                                        </td>
                                        <td class="border-b border-gray-200 px-6 py-3">
                                            <span
                                                class="text-sm font-semibold text-black">{{ $subject->subject_detail->subject_name }}</span>
                                        </td>
                                        <td class="border-b border-gray-200 px-6 py-3">
                                            <div class="flex items-center justify-end gap-x-4">
                                                <!-- View Assessment / Create Assessment -->
                                                @if ($subject->assessment)
                                                    <a class="inline-flex items-center gap-x-2 text-sm font-medium text-blue-600 decoration-2 hover:underline"
                                                        href="{{ route('assessments.show', ['tuitionAssessment' => $subject->assessment]) }}">
                                                        View Assessment
                                                    </a>
                                                @else
                                                    <a class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-md transition-all duration-200 ease-in-out hover:bg-blue-700"
                                                        href="{{ route('assessments.create', ['id' => $subject->id]) }}">
                                                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14" />
                                                            <path d="M12 5v14" />
                                                        </svg>
                                                        Create Assessment
                                                    </a>
                                                @endif

                                                <!-- View Material Button -->
                                                <a class="inline-flex items-center gap-x-2 text-sm font-medium text-green-600 decoration-2 hover:underline"
                                                    href="#">
                                                    View Material
                                                </a>

                                                <!-- Add Material Button -->
                                                <a class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-md transition-all duration-200 ease-in-out hover:bg-green-700"
                                                    href="#">
                                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M5 12h14" />
                                                        <path d="M12 5v14" />
                                                    </svg>
                                                    Add Material
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
