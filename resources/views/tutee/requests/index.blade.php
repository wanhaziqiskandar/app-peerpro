<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Tabs -->
        <div class="mb-6 flex justify-center border-b border-gray-200">
            <ul class="-mb-px flex flex-wrap text-center text-sm font-medium">
                <li class="mr-2">
                    <a href="{{ route('requests.index', ['tab' => 'rejected']) }}"
                        class="{{ request('tab', 'pending') == 'rejected' ? 'border-b-2 border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:border-blue-600 hover:text-blue-600' }} inline-block p-4">
                        Rejected Requests
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('requests.index', ['tab' => 'pending']) }}"
                        class="{{ request('tab', 'pending') == 'pending' ? 'border-b-2 border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:border-blue-600 hover:text-blue-600' }} inline-block p-4">
                        Pending Requests
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('requests.index', ['tab' => 'scheduled']) }}"
                        class="{{ request('tab', 'pending') == 'scheduled' ? 'border-b-2 border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:border-blue-600 hover:text-blue-600' }} inline-block p-4">
                        Scheduled Sessions
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('requests.index', ['tab' => 'completed']) }}"
                        class="{{ request('tab', 'pending') == 'completed' ? 'border-b-2 border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:border-blue-600 hover:text-blue-600' }} inline-block p-4">
                        Completed Sessions
                    </a>
                </li>
            </ul>
        </div>



        <!-- Card Section -->
        <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-2">
            @if ($requests->isEmpty())
                <!-- Message for No Requests -->
                <div class="flex items-center justify-center">
                    <p class="rounded-lg bg-gray-100 px-6 py-4 text-center text-lg font-semibold text-gray-700 shadow">
                        No requests available at the moment.
                    </p>
                </div>
            @else
                <!-- Tabs for Status within Scheduled Sessions (Visible Only for Tutors) -->
                @if (request('tab') == 'scheduled' && Auth::user()->isTutor())
                    <div class="mb-4 flex items-center justify-center space-x-4 rounded-lg bg-gray-50 ">
                        <!-- Default to 'accepted' status if no status is provided -->
                        <a href="{{ route('requests.index', ['tab' => 'scheduled', 'status' => 'accepted']) }}"
                            class="{{ request('status', 'accepted') == 'accepted' ? 'bg-green-500 text-white border-2 border-green-600' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-green-100 dark:hover:bg-gray-600 hover:text-green-600' }} inline-flex transform items-center justify-center rounded-lg px-6 py-3 text-sm font-semibold transition-all duration-300 ease-in-out hover:scale-105">
                            Accepted
                        </a>
                        <a href="{{ route('requests.index', ['tab' => 'scheduled', 'status' => 'paid']) }}"
                            class="{{ request('status', 'accepted') == 'paid' ? 'bg-blue-500 text-white border-2 border-blue-600' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-gray-600 hover:text-blue-600' }} inline-flex transform items-center justify-center rounded-lg px-6 py-3 text-sm font-semibold transition-all duration-300 ease-in-out hover:scale-105">
                            Paid
                        </a>
                    </div>
                @endif
                <!-- Grid Container for Cards -->
                <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 xl:grid-cols-4">
                    @foreach ($requests as $request)
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
                                <p class="mt-1 flex justify-end text-sm font-bold text-gray-600">
                                    RM{{ $request->tutor->price_rate }}/hour
                                </p>
                                <div class="my-2 flex flex-col justify-center text-center text-white">
                                    <!-- Status Label -->
                                    <span
                                        class="@if ($request->status == 'rejected') bg-red-600 
                                        @elseif ($request->status == 'accepted') bg-green-600 
                                        @elseif ($request->status == 'pending') bg-yellow-600 
                                        @elseif ($request->status == 'paid') bg-blue-600 
                                        @elseif ($request->status == 'completed') bg-purple-600 @endif w-full rounded-full p-1 font-bold">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </div>

                                <div class="mt-4 flex flex-col items-center gap-y-3">
                                    <!-- View Assessment Button (visible for tutor before accepting) -->
                                    @if (Auth::user()->isTutor())
                                        <a href="{{ route('assessments.results', ['id' => $request->id]) }}"
                                            class="inline-flex items-center justify-center rounded-lg bg-cyan-700 px-7 py-2 text-sm font-semibold text-white hover:bg-cyan-800">
                                            View Assessment
                                        </a>
                                    @elseif (Auth::user()->isTutee())
                                        @if ($request->status != 'pending')
                                            @if ($request->status == 'accepted')
                                                <a href="{{ route('payments.index', ['id' => $request->id]) }}"
                                                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-7 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                                                    Pay
                                                </a>
                                            @endif
                                            @if ($link = $request->tuitionAssessment->subject->material_link)
                                                <a href="{{ $link }}" target="_blank"
                                                    class="inline-flex items-center justify-center rounded-lg bg-purple-600 px-7 py-2 text-white hover:bg-purple-700">View
                                                    Material</a>
                                            @endif
                                        @endif
                                    @endif

                                    <!-- Pay and Chat Accepted or Rejected or Pending (Side by Side) -->
                                    <div class="flex gap-x-3">
                                        @if (Auth::user()->isTutor())
                                            <form action="{{ route('requests.update_status') }}" method="POST">
                                                @csrf
                                                @method('post')
                                                <input type="text" value="{{ $request->id }} "
                                                    name="tuition_request_id" hidden>
                                                @if ($request->status == 'pending')
                                                    <button type="submit" name="status" value="accepted"
                                                        class="inline-flex items-center justify-center rounded-lg bg-green-600 px-7 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                                        Accept
                                                    </button>
                                                    <button type="submit" name="status" value="rejected"
                                                        class="inline-flex items-center justify-center rounded-lg bg-red-600 px-7 py-2 text-sm font-semibold text-white hover:bg-red-700">
                                                        Reject
                                                    </button>
                                                @elseif ($request->status == 'paid')
                                                    <button type="submit" name="status" value="completed"
                                                        class="inline-flex items-center justify-center rounded-lg bg-yellow-600 px-7 py-2 text-sm font-semibold text-white hover:bg-yellow-700">
                                                        Mark as Complete
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
