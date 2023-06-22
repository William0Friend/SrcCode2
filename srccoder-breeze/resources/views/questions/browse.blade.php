<x-app-guest>
    <div class="container px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold leading-9 text-center">Browse Questions</h1>
        <table id="questions-table" class="w-full mt-4 display">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>User</th>
                    <th>Bounty</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        // I'm going to use jQuery's shorthand for a document ready event, $(function() { ... }), 
        // to ensure the code inside it runs only once the page Document Object Model (DOM) is ready for JavaScript code to execute.
        $(function() {
    
            // Now, I'm going to use the DataTables plugin on my table with the id 'questions-table'. 
            $('#questions-table').DataTable({
    
                // I want to show a processing indicator when the table is being loaded, hence setting 'processing' to true.
                processing: true,
    
                // I want the heavy data processing tasks to be performed at the server side, so I set 'serverSide' to true.
                serverSide: true,
    
                // For this table, the data is going to come from a server-side route that's named 'questions.browse.data', 
                // I'll set it to the 'ajax' property.
                ajax: '{{ route('questions.browse.data') }}',
    
                // Now, I need to specify the data structure that this table is expecting.
                // 'columns' is an array that describes this structure.
                columns: [
    
                    // The first column is for the 'title' of the questions. 
                    // The 'data' and 'name' properties are both set to 'title'.
                    { data: 'title', name: 'title' },
    
                    // The second column is for the 'user' who posted the question. 
                    // In case a question doesn't have an associated user, I set a default value of 'Unknown'.
                    { data: 'user.name', name: 'user.name', defaultContent: 'Unknown' },
    
                    // The third column is for 'bounty'. If there is no bounty associated with a question, 
                    // it will show 'None'. If there is, it will show the bounty amount.
                    { 
                        data: 'bounty.bounty', 
                        name: 'bounty.bounty', 
                        defaultContent: 'None',
                        render: function ( data, type, row ) {
                            // I'm checking if bounty is not null, if it's not null then display the bounty's bounty, 
                            // otherwise display 'None'.
                            return row.bounty ? row.bounty.bounty : 'None';
                        }
                    },
    
                    // The last column is the 'actions' column. This is where I'll put buttons for 'Question' and 'Answer'.
                    // For this column, the data is null, and I'll manually render the content.
                    { data: null, render: function ( data, type, row ) {
    
                        // I'm creating a URL for each question based on its 'slug' and another for the answer form.
                        var viewUrl = "/questions/" + data.slug;
                        var answerUrl = viewUrl + "#answer-form";
    
                        // Next, I'm generating the HTML for the 'Question' and 'Answer' buttons with their respective URLs.
                        var buttons = '<a href="' + viewUrl + '" class="inline-flex items-center px-4 py-2 text-xs font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Question</a> ';
                        buttons += '<a href="' + answerUrl + '" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Answer</a>';
    
                        // I'm then returning these buttons as the final content of this column.
                        return buttons;
                    }},
                ]
            });
        });
    </script>

</x-app-guest>
{{--  <x-app-guest>
    <div class="container px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold leading-9 text-center">Browse Questions</h1>
        <table id="questions-table" class="w-full mt-4 display">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>User</th>
                    <th>Bounty</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#questions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('questions.browse.data') }}',
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'user.name', name: 'user.name', defaultContent: 'Unknown' },
                    { 
                      data: 'bounty.bounty', 
                      name: 'bounty.bounty', 
                      defaultContent: 'None',
                      render: function (data, type, row) {
                        if (row.bounty && row.bounty.bounty) {
                            return row.bounty.bounty;
                        } else {
                            return 'None';
                        }
                      }
                    },
                    { data: null, render: function (data, type, row) {
                        var viewUrl = "/questions/" + data.slug;
                        var answerUrl = viewUrl + "#answer-form";
                        var buttons = '<a href="' + viewUrl + '" class="inline-flex items-center px-4 py-2 text-xs font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Question</a> ';
                        buttons += '<a href="' + answerUrl + '" class="inline-flex items-center px-4 py-2 ml-4 text-xs font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Answer</a>';
                        return buttons;
                    }},
                ]
            });
        });
    </script>
</x-app-guest>  --}}