<x-app-guest>
    <!--JumboTron-->
    <div id="mission" class="px-5 py-10 mb-10 bg-gray-100 rounded-lg shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="mb-5 text-4xl font-bold"> $rcCode Mission Statement</h1>
            <p class="mb-5 text-lg">
                $rcCodes mission is to empower independent business owners, dreamers,
                non-technical creatives, or anyone who may have problems that need technical expertise to solve,
                by providing an easy to use platform, to connect with
                developers, engineers, scientists, and programmers. With $rcCode you can easily propose your problem,
                find your expert, hire, and carry your project through to production, inside the same app.
            </p>
            <ul class="mb-5 text-left list-disc list-inside">
                <li>All payments handled through stripe, square, or crypto.</li>
                <li>All code hosted through GitHub.</li>
                <li>Both public and anonymous problem and solution transactions are available.</li>
            </ul>
            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded btn-action hover:bg-blue-700" title="I want to propose a problem">Problems</button>
            <button class="px-4 py-2 ml-5 font-bold text-white bg-blue-500 rounded btn-action hover:bg-blue-700" title="I want to propose a solution">Solutions</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--  <script>
    $(function() {
        $("#mission").hide().slideDown(1000);
        $(".btn-action").click(function() {
            // Add actions for the buttons
        });
    });
    </script>  --}}
</x-app-guest>
