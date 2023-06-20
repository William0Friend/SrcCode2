<x-app>
    <!-- in the head section -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    
    <!-- at the end of the body -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    @stack('scripts')
    <div class="container">
        <table id="questions-table" class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Bounty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->title }}</td>
                        <td>{{ $question->bounty ? $question->bounty->bounty : 'None' }}</td>
                        <td>
                            <a href="{{ route('questions.show', $question->slug) }}" class="btn btn-primary">View</a>
                            @auth
                                <a href="{{ route('questions.show', $question->slug) . '#answer-form' }}" class="btn btn-success">Answer</a>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        {{ $questions->links() }} <!-- pagination links -->
    </div>
    
    
    @push('scripts')
    <script>
    $(document).ready(function() {
        $('#questions-table').DataTable();
    });
    </script>
    @endpush
    
</x-app>
