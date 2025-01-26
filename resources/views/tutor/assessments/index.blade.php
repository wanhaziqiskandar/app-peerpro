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
                                    <td class=" px-6 py-3 flex flex-col">
                                        <span
                                            class="text-md font-semibold text-black">{{ $subject->subject_detail->subject_name }}
                                        </span>
                                        @if (!$subject->assessment)
                                            <span class="text-sm text-red-500">Your subject will not be displayed to tutees if no assessment set for it.</span>
                                        @endif
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

                                            @if($subject->material_link)
                                            <!-- View Material Button -->
                                            <a class="inline-flex items-center gap-x-2 text-sm font-medium text-green-600 decoration-2 hover:underline"
                                                href="{{$subject->material_link}}" target="_blank">
                                                View Material
                                            </a>
                                            @endif
                                            <!-- Add Material Button -->
                                            <button onclick="openModal('materialModal{{$subject->id}}')"
                                                class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-md transition-all duration-200 ease-in-out hover:bg-green-700">
                                                <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                    <path d="M12 5v14" />
                                                </svg>
                                            @if($subject->material_link)
                                                Edit Material
                                            @else
                                                Add Material
                                            @endif
                                            </button>
                                        </div>
                                        <!-- Add Material Modal -->
                                        <div id="materialModal{{$subject->id}}" class="fixed inset-0 flex hidden items-center justify-center bg-black bg-opacity-50">
                                            <div class="w-1/3 rounded-lg bg-white p-6 shadow-lg">
                                                <h3 class="mb-4 text-lg font-semibold">Add Material</h3>
                                                <form action="{{route('assessments.add_material', ['subject' => $subject])}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="mb-4">
                                                        <label for="materialName" class="block text-md font-medium text-gray-700">Material Link</label>
                                                        <p class="text-sm text-gray-400">Please enter the link to your Google Drive/OneDrive folder that contains your subject materials or any links related to the subjects.</p>
                                                        <input type="url" id="materialName" name="material_link" required
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                                            value="{{$subject->material_link}}">
                                                    </div>
                                                    <div class="flex justify-end gap-2">
                                                        <button type="button" onclick="closeModal('materialModal{{$subject->id}}')"
                                                            class="rounded-lg bg-gray-500 px-4 py-2 text-white">Cancel</button>
                                                        <button type="submit" class="rounded-lg bg-green-600 px-4 py-2 text-white">Save</button>
                                                    </div>
                                                </form>
                                            </div>
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



    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            // document.getElementById('subject_id').value = subjectId;
            // console.log(document.getElementById('subject_id').value);
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</x-app-layout>
