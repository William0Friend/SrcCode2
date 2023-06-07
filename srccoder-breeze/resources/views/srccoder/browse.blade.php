{{--@php session_start();--}}
{{--require 'db_connection.php';--}}
{{--if (mysqli_connect_errno()) {--}}
{{--    exit('Failed to connect to MySQL: ' . mysqli_connect_error());--}}
{{--}--}}

{{--$sql = "SELECT Questions.id, Users.username, Questions.title, Questions.body, Bounties.amount, Questions.timestamp--}}
{{--        FROM Questions--}}
{{--        LEFT JOIN Users ON Questions.user_id = Users.id--}}
{{--        LEFT JOIN Bounties ON Questions.bounty_id = Bounties.id--}}
{{--        WHERE Questions.id NOT IN (SELECT DISTINCT question_id FROM Answers)";--}}
{{--$result = $conn->query($sql);--}}

{{--if (!$result) {--}}
{{--    die("Query failed: " . $conn->error);--}}
{{--}--}}

{{--if ($result->num_rows > 0) {--}}
{{--    $div_data = "";--}}
{{--    while($row = $result->fetch_assoc()) {--}}
{{--        $username = htmlspecialchars($row["username"]);--}}
{{--        $title = htmlspecialchars($row["title"]);--}}
{{--        $body = htmlspecialchars($row["body"]);--}}
{{--        $bounty = htmlspecialchars($row["amount"]);          $timestamp = htmlspecialchars($row["timestamp"]);--}}

{{--        $div_data .= "<div class=\"container bg-dark text-white p-5 mb-4 rounded-3 shadow-lg\">Username:   " . $username. "<br/>Question Title:   " . $title. "<br/>Question Body:   " . $body. "<br/>Question Bounty:   " . $bounty. "<br/>Question Submission Date:   " . $timestamp. "<br/><button class=\"btn btn-danger text-white align-center\">Answer Question</button></div>";--}}
{{--            }--}}
{{--} else {--}}
{{--    $div_data = "<div colspan='6'>No unanswered questions.</div>";--}}
{{--}--}}


{{--$sql = "SELECT Questions.id, Users.username, Questions.title, Questions.body, Bounties.amount AS bounty, Questions.timestamp--}}
{{--        FROM Questions--}}
{{--        LEFT JOIN Users ON Questions.user_id = Users.id--}}
{{--        LEFT JOIN Bounties ON Questions.bounty_id = Bounties.id--}}
{{--        WHERE Questions.id NOT IN (SELECT DISTINCT question_id FROM Answers)";--}}
{{--$result = $conn->query($sql);--}}

{{--$questions = $result->fetch_all(MYSQLI_ASSOC); @endphp--}}


<x-srccoder>
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

        @foreach ($questions as $question)

            <tr>
                <td>{!! htmlspecialchars($question["username"]) !!}</td>
                <td><a href="Question_Individual_Generator.php?id={!! htmlspecialchars($question["id"]) !!}">{!! htmlspecialchars($question["title"]) !!}</a></td>
                <td>{!! htmlspecialchars($question["body"]) !!}</td>
                <td>{!! htmlspecialchars($question["bounty"]) !!}</td>
                <td>{!! htmlspecialchars($question["timestamp"]) !!}</td>
                <td>
                    <a href="Question_Individual_Generator.php?id={!! htmlspecialchars($question["id"]) !!}" class="btn btn-danger">Question</a></td>
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
                        <textarea id="description" name="description" placeholder="Source Code Description" class="form-control mt-2" rows="4"></textarea>
                        <textarea id="code" name="code" placeholder="Paste your source code here" class="form-control mt-2" rows="6"></textarea>
                        <button type="submit" class="btn btn-secondary mt-2">Sell</button>
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


</x-srccoder>
