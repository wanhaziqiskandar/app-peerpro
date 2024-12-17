<x-app-layout>
    <div class="d-flex justify-content-center align-items-center container-fluid bg-dark" style="min-height: 100vh;">
        <div class="col-lg-8 p-5">
            <!-- Main card container with a dark background centered -->
            <div class="card mx-auto my-2 rounded-xl bg-gray-800 p-5 shadow-lg">
                <h1 class="mb-4 text-center font-semibold text-white">Assessment</h1>
                @if($assessments)
                    @php
                        $question_no =1;
                    @endphp
                    @foreach ($assessments->questions as $question)
                        <div class="card mx-2 my-4 p-2 rounded bg-gray-600 dark:text-white">
                            <h2>Question {{$question_no++}}</h2>
                            <h5>{{$question['question']}}</h5>
                            <div class="mx-2">
                            @if ($question['type'] == 'multiple_choice')
                                <ol class="ml-4" style="list-style-type: upper-alpha;">
                                    @foreach ($question['answers'] as $answer)
                                        <li>{{$answer}}</li>

                                    @endforeach
                                </ol>
                                @php
                                    switch($question['correct_answer']){
                                        case (0):
                                            $answer = 'A';
                                            break;
                                        case (1):
                                            $answer = 'B';
                                            break;
                                        case (2):
                                            $answer = 'C';
                                            break;
                                        case (3):
                                            $answer = 'D';
                                            break;
                                    }
                                @endphp
                                <p>Correct Answer: {{$answer}}</p>
                            @else
                                <p>Correct Answer: {{ucfirst($question['true_false'])}}</p>
                            @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <a href="{{route('assessments.create')}}">Create Assessment</a>
                    </div>
                    <div>
                        No assessments available
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
