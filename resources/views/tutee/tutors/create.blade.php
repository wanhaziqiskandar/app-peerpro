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
                            <select name="expertise" required
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option selected disabled>Choose a subject</option>
                                @foreach ($tutor->expertise->whereNotNull('assessment_id') as $subject)
                                    <option value="{{ $subject->subject_detail->id }}">
                                        {{ $subject->subject_detail->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <!-- Requirement -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Additional Notes (Optional)</label>
                        </div>
                        <div class="max-w-sm space-y-2 sm:col-span-9">
                            <textarea name="additional_request"
                                class="block w-full rounded-lg border-transparent bg-gray-100 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                                rows="3" placeholder="Write any additional requests here..."></textarea>
                        </div> --}}

                        <!-- Date -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Date</label>
                        </div>
                        <div class="sm:col-span-9">
                            <input id="datePicker"
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                type="date" name="date" min="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Timeslot -->
                        <div class="sm:col-span-3">
                            <label class="mt-2.5 text-sm text-gray-800">Timeslot</label>
                        </div>
                        <div class="sm:col-span-9">
                            <select id="timeslotSelect" name="session" required
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option selected disabled>Choose a timeslot</option>
                                <option id="morning" value="morning">Morning (9:00 AM - 12:00 PM)</option>
                                <option id="afternoon" value="afternoon">Afternoon (1:00 PM - 4:00 PM)</option>
                                <option id="evening" value="evening">Evening (6:00 PM - 9:00 PM)</option>
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


    <script>
        $(document).ready(function() {
            // Add error message container
            $('#timeslotSelect').after('<div id="timeslotError" class="mt-2 text-sm text-red-600 hidden"></div>');

            // Function to check time restrictions for current day
            function checkTimeRestrictions() {
                const currentTime = new Date();
                const hour = currentTime.getHours();
                const currentDate = currentTime.toLocaleDateString();
                const selectedDate = new Date(document.getElementById('datePicker').value).toLocaleDateString();

                // Reset all slots first
                ['morning', 'afternoon', 'evening'].forEach(slot => {
                    document.getElementById(slot).disabled = false;
                });

                // Apply time restrictions only for current day
                if (selectedDate === currentDate) {
                    if (hour >= 9) document.getElementById('morning').disabled = true;
                    if (hour >= 13) document.getElementById('afternoon').disabled = true;
                    if (hour >= 18) document.getElementById('evening').disabled = true;
                }
            }

            // Function to check booked timeslots
            function checkBookedTimeslots() {
                const selectedDate = $('#datePicker').val();
                const tutorId = $('input[name="tutor_id"]').val();

                if (selectedDate) {
                    $.ajax({
                        url: '/check-availability',
                        method: 'GET',
                        data: {
                            date: selectedDate,
                            tutor_id: tutorId
                        },
                        success: function(bookedSlots) {
                            // Reset time restrictions first
                            checkTimeRestrictions();

                            // Then disable booked slots
                            bookedSlots.forEach(slot => {
                                document.getElementById(slot).disabled = true;
                            });

                            // If current selected timeslot is booked, show error
                            const currentTimeslot = $('#timeslotSelect').val();
                            if (currentTimeslot && bookedSlots.includes(currentTimeslot)) {
                                $('#timeslotError')
                                    .text(
                                        'This timeslot is already booked. Please select another time.')
                                    .removeClass('hidden');
                                $('button[type="submit"]').prop('disabled', true);
                            }
                        }
                    });
                }
            }

            // Check availability when date changes
            $('#datePicker').change(function() {
                $('#timeslotError').addClass('hidden');
                $('button[type="submit"]').prop('disabled', false);
                checkBookedTimeslots();
            });

            // Validate when timeslot is selected
            $('#timeslotSelect').change(function() {
                const selectedTimeslot = $(this).val();

                if (selectedTimeslot) {
                    $('#timeslotError').addClass('hidden');
                    $('button[type="submit"]').prop('disabled', false);
                    checkBookedTimeslots();
                }
            });

            // Form submission validation
            $('form').submit(function(e) {
                const selectedTimeslot = $('#timeslotSelect').val();

                if (!selectedTimeslot) {
                    e.preventDefault();
                    $('#timeslotError')
                        .text('Please select a timeslot')
                        .removeClass('hidden');
                    return false;
                }

                if ($('#timeslotError').is(':visible')) {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>
    {{-- <script>
        // Example booked timeslots coming from the backend
        // window.onload = function() {
        // $(document).ready(checkAvailability());
        // console.log($('#datePicker'));
        $('#datePicker').change(function() {
            const currentTime = new Date();
            const hour = currentTime.getHours();
            const currentDate = currentTime.toLocaleDateString();
            const selectedDate = new Date(document.getElementById('datePicker').value).toLocaleDateString();

            console.log(selectedDate);
            if (selectedDate == currentDate && hour >= 9) {
                document.getElementById('morning').disabled = true;
            } else {
                document.getElementById('morning').disabled = false;
            }
            if (selectedDate == currentDate && hour >= 13) {
                document.getElementById('afternoon').disabled = true;
            } else {
                document.getElementById('afternoon').disabled = false;
            }
            if (selectedDate == currentDate && hour >= 18) {
                document.getElementById('evening').disabled = true;
            } else {
                document.getElementById('evening').disabled = false;
            }
        });
    </script> --}}
</x-app-layout>
