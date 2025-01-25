<x-app-layout>
    <div class="min-h-screen bg-gray-50">

        <!-- Tabs -->
        <div class="mb-6 flex justify-center border-b border-gray-200">
            <ul class="-mb-px flex flex-wrap text-center text-sm font-medium">
                <li class="mr-2">
                    <a href="#" class="inline-block border-b-2 border-blue-600 p-4 text-blue-600">Pending
                        Requests</a>
                </li>
                <li class="relative mr-2">
                    <a href="#"
                        class="inline-block border-b-2 border-transparent p-4 text-gray-500 hover:border-blue-600 hover:text-blue-600">Scheduled
                        Sessions</a>
                    <ul
                        class="absolute left-0 mt-1 hidden w-40 space-y-1 rounded-lg bg-white shadow-md group-hover:block">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Past</a>
                        </li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Today</a>
                        </li>
                        <li><a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Upcoming</a></li>
                    </ul>
                </li>
                <li class="mr-2">
                    <a href="#"
                        class="inline-block border-b-2 border-transparent p-4 text-gray-500 hover:border-blue-600 hover:text-blue-600">Completed
                        Sessions</a>
                </li>
            </ul>
        </div>
        <!-- Card Section -->
        <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
            @if ($requests->isEmpty())
                <!-- Message for No Requests -->
                <div class="flex items-center justify-center">
                    <p class="rounded-lg bg-gray-100 px-6 py-4 text-center text-lg font-semibold text-gray-700 shadow">
                        No requests available at the moment.
                    </p>
                </div>
            @else
                <!-- Grid Container for Cards -->
                <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 xl:grid-cols-4">
                    @foreach ($requests as $request)
                        <!-- Tutor Card -->
                        <div class="group flex flex-col rounded-lg bg-white shadow-lg">
                            <div class="p-4 md:p-7">
                                <!-- Name -->
                                <h3 class="mt-1 text-sm text-gray-600">
                                    Name:
                                    {{ auth()->user()->isTutor() ? $request->tutee->name : $request->tutor->name }}
                                </h3>
                                <!-- Expertise -->
                                <p class="mt-1 text-sm text-gray-600">
                                    Subject: {{ $request->subject->subject_name }}
                                </p>
                                <!-- Timeslot -->
                                <p class="mt-1 text-sm text-gray-600">
                                    Timeslot: {{ $request->session }}
                                </p>
                                <!-- Rate -->
                                <p class="mt-1 flex justify-end text-sm text-gray-600">
                                    RM{{ $request->tutor->price_rate }}/hour
                                </p>
                                <div class="my-2 flex flex-col justify-center text-center text-white">
                                    <span
                                        class="w-full rounded-full bg-blue-400 p-1 font-bold">{{ ucfirst($request->status) }}</span>
                                </div>

                                <div class="mt-4 flex flex-col items-center gap-y-3">
                                    <!-- View Assessment Button (visible for tutor before accepting) -->
                                    @if (Auth::user()->isTutor())
                                        <a href="{{ route('assessments.results', ['id' => $request->id]) }}"
                                            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                                            View Assessment
                                        </a>
                                    @elseif (Auth::user()->isTutee())
                                        @if ($request->status != 'pending')
                                            @if ($request->status == 'accepted')
                                                <a href="{{ route('payments.index', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                                                    Pay
                                                </a>
                                            @endif
                                            @if ($link = $request->tuitionAssessment->subject->material_link)
                                                <a href="{{ $link }}" target="_blank"
                                                    class="mx-auto rounded-full bg-purple-600 px-4 py-2 text-white">View
                                                    Material</a>
                                            @endif
                                        @endif
                                    @endif

                                    <!-- Pay and Chat Accepted or Rejected or Pending (Side by Side) -->
                                    <div class="flex gap-x-3">
                                        <!-- Accepted, Rejected, Pending Buttons -->
                                        @if (Auth::user()->isTutor())
                                            <form action="{{ route('requests.update_status') }}" method="POST">
                                                @csrf
                                                @method('post')
                                                <input type="text" value="{{ $request->id }}"
                                                    name="tuition_request_id" hidden>
                                                @if ($request->status == 'paid')
                                                    @if ($request->payment)
                                                        <button type="submit" name="status" value="completed"
                                                            class="inline-flex items-center justify-center rounded-lg bg-yellow-600 px-7 py-2 text-sm font-semibold text-white hover:bg-yellow-700">
                                                            Mark as Complete
                                                        </button>
                                                    @else
                                                        <button type="submit" name="status" value="cancelled"
                                                            class="inline-flex items-center justify-center rounded-lg bg-yellow-600 px-7 py-2 text-sm font-semibold text-white hover:bg-yellow-700">
                                                            Cancel
                                                        </button>
                                                    @endif
                                                @elseif ($request->status == 'pending')
                                                    <button type="submit" name="status" value="accepted"
                                                        class="inline-flex items-center justify-center rounded-lg bg-green-600 px-7 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                                        Accept
                                                    </button>
                                                    <button type="submit" name="status" value="rejected"
                                                        class="inline-flex items-center justify-center rounded-lg bg-red-600 px-7 py-2 text-sm font-semibold text-white hover:bg-red-700">
                                                        Reject
                                                    </button>
                                                @endif
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
