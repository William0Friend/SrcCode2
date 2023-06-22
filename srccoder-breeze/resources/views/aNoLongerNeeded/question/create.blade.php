{{--  @extends('layouts.blog')

@section('content')  --}}

<x-debugbar/>
<x-app>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                <a href="/question" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="pt-4 pb-4 pl-4 pr-4 mt-5 border rounded">
                    <h1 class="display-4">Create a New Question</h1>
                    <p>Fill and submit this form to create a question post</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Question Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Question Title" required>
                            </div>
                            <div class="mt-2 control-group col-12">
                                <label for="body">Question Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="" required></textarea>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center control-group col-12">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app>
{{--  @endsection  --}}