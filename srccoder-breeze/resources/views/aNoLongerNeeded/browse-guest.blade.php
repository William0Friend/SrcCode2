<x-app-guest>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <main>
    <!-- Unanswered questions table jquery version -->
    <table id="questionsTable" class="display">
        <thead>
        <tr>
            <th>Username</th>
            <th>Title</th>
            <th>Body</th>
            <th>Bounty</th>
            <th>Timestamp</th>
            <th>Actions</th>
            <th>Q & A</th>
        </tr>
        </thead> 
        <tbody>
            
        {{--  $questions = Questions::all();  --}}
        @foreach ($questions as $question)
        {{--  $username = DB::select('SELECT username from users LEFT JOIN questions ON (questions.user_id = users.id)',);  --}}
        {{--  $username = DB::table('users')
        ->join('questions', 'questions.user_id', '=', 'users.id')
        ->select('users.username')
        ->where('users.id', '=', $question["user_id"])
        ->get();  --}}
        {{--  $username = DB::select
        ('SELECT username from users LEFT JOIN questions ON (questions.user_id = users.id)',);
            <tr>
                {{--  <td>{!! htmlspecialchars($question["user_id"]  ) !!}</td>  --}}
                <td>{!! htmlspecialchars($question["user_id"]) !!}</td>
                <td><a href="Question_Individual_Generator.php?id={!! htmlspecialchars($question["id"]) !!}">{!! htmlspecialchars($question["title"]) !!}</a></td>
                <td>{!! htmlspecialchars($question["body"]) !!}</td>
                <td>{!! htmlspecialchars($question["bounty_id"]) !!}</td>
                <td>{!! htmlspecialchars($question["timestamp"]) !!}</td>
                {{--  <td>
                    <a href="/srccoder/question_maker?id={!! htmlspecialchars($question["id"]) !!}" class="btn btn-danger">Question</a>
                </td>  --}}
                <td>
                    <button type="button" class="btn btn-primary sellButton" data-bs-toggle="modal" data-bs-target="#sellSourceCodeModal" data-question-id="{!! htmlspecialchars($question["id"]) !!}">Answer</button>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    <div class="modal fade" id="sellSourceCodeModal" tabindex="-1" aria-labelledby="sellSourceCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sellSourceCodeModalLabel">Sell Source Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sellSourceCodeForm" method="POST" action="sell_source_code_action_2.php" class="mt-3">
                        <input type="hidden" id="questionIdInput" name="questionId" />
                        <h6 class="mb-2">Sell Source Code:</h6>
                        <input type="text" id="title" name="title" placeholder="Source Code Title" class="form-control" />
                        <textarea id="description" name="description" placeholder="Source Code Description" class="mt-2 form-control" rows="4"></textarea>
                        <textarea id="code" name="code" placeholder="Paste your source code here" class="mt-2 form-control" rows="6"></textarea>
                        <button type="submit" class="mt-2 btn btn-secondary">Sell</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- call thhe dataTable  -->
    <script>
        //create answer button
        $(document).ready(function() {
            //call the datatable
            $('#questionsTable').DataTable();

            $('.sellButton').on('click', '.btn-primary', function(event) {

                @if (isset($_SESSION['loggedin']))

                var questionId = $(this).data('question-id');
                $('#questionIdInput').val(questionId);

                @else

                // Redirect to login page
                window.location.href = 'Login.php';

                @endif

            });
        });
        // $(document).ready(function() {
        //     $('#questionsTable').DataTable();

        //     $('.sellButton').on('click', function() {
        //         var questionId = $(this).data('question-id');
        //         $('#questionIdInput').val(questionId);
        //     });
        // });

    </script>



    </main>


</x-app-guest>
