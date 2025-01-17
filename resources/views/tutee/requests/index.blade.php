<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Card Section -->
        <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
            <!-- Grid Container for Cards -->
            <div class="grid gap-3 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 xl:grid-cols-4">
                @foreach ($requests as $request)
                    <!-- Tutor Card -->
                    <div class="group flex flex-col rounded-lg bg-white shadow-lg">
                        <div class="p-4 md:p-7">
                            <!-- Name -->
                            <h3 class="mt-1 text-sm text-gray-600">
                                Name: {{auth()->user()->isTutor() ? $request->tutee->name : $request->tutor->name}}
                            </h3>
                            <!-- Expertise -->
                            <p class="mt-1 text-sm text-gray-600">
                                Expertise: {{ $request->tutor->expertise }}
                            </p>
                            {{-- Timeslot --}}
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
                                @endif

                                <!-- Pay and Chat Accepted or Rejected or Pending (Side by Side) -->
                                <div class="flex gap-x-3">
                                    <!-- Accepted, Rejected, Pending Buttons -->
                                    @if (Auth::user()->isTutor())
                                        <form action="{{ route('requests.update_status') }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <input type="text" value="{{ $request->id }}" name="tuition_request_id"
                                                hidden>
                                            @if ($request->status == 'accepted')
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
        </div>
    </div>
</x-app-layout>
