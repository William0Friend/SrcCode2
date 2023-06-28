<x-app-guest>
    <!-- in the head section -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    
    <!-- at the end of the body -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#questions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('questions.browse') }}',
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'bounty.bounty', name: 'bounty.bounty', defaultContent: 'None' },
                    { data: null, render: function ( data, type, row ) {
                        // Construct action buttons. Be aware of XSS risk!
                        // Consider using a safer method to generate these URLs.
                        var viewUrl = "/questions/" + data.slug;
                        var answerUrl = viewUrl + "#answer-form";
                        var buttons = '<a href="' + viewUrl + '" class="btn btn-primary">View</a>';
                        buttons += '<a href="' + answerUrl + '" class="btn btn-success">Answer</a>';
                        return buttons;
                    }},
                ]
            });
        });
    </script>
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
                            @else
                            <a href="{{ route('login')}}" class="btn btn-dark">Login to Answer</a>
                            
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        {{ $questions->links() }} <!-- pagination links -->
    </div>
    
    
    @push('scripts')
    {{--  <script>
    $(document).ready(function() {
        $('#questions-table').DataTable();
    });
    </script>  --}}
    @endpush
    
</x-app-guest>
