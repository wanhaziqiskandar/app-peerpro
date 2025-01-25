<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Card Section -->
        <div class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">
            <!-- Card -->
            <div class="rounded-xl bg-white p-4 shadow-lg sm:p-7">
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800">Request for Tutor</h2>
                    <p class="text-sm text-gray-600">Submit your requirements for tutoring assistance.</p>
                </div>

                <form action="{{ route('requests.store', $tutor) }}" method="POST">
                    @csrf
                    @method('post')
                    <!-- Grid -->
                    <div class="grid gap-4 sm:grid-cols-12 sm:gap-6">
                        <input type="text" name="tutor_id" value="{{ $tutor->id }}" hidden>

                        <!-- Expertise -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Expertise</label>
                        </div>
                        <div class="sm:col-span-9">
                            <select name="expertise"
                                required
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option selected disabled>Choose a subject</option>
                                @foreach ($tutor->expertise->whereNotNull('assessment_id') as $subject)
                                    <option value="{{$subject->subject_detail->id}}">{{$subject->subject_detail->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Requirement -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Additional Notes (Optional)</label>
                        </div>
                        <div class="max-w-sm space-y-2 sm:col-span-9">
                            <textarea name="additional_request"
                                class="block w-full rounded-lg border-transparent bg-gray-100 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                                rows="3" placeholder="Write any additional requests here..."></textarea>
                        </div>

                        <!-- Date -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Date</label>
                        </div>
                        <div class="sm:col-span-9">
                            <input
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                type="date" name="date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                        </div>

                        <!-- Timeslot -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Timeslot</label>
                        </div>
                        <div class="sm:col-span-9">
                            <select name="session"
                                required
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option selected disabled>Choose a timeslot</option>
                                <option value="morning">Morning (9:00 AM - 12:00 PM)</option>
                                <option value="afternoon">Afternoon (1:00 PM - 4:00 PM)</option>
                                <option value="evening">Evening (6:00 PM - 9:00 PM)</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex justify-end gap-2">
                        <a class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50"
                            href="{{ route('tutors.index') }}">Cancel</a>
                        <button type="submit"
                            class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">Next</button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Card Section -->
</x-app-layout>
