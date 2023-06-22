{{--  @extends('layouts.blog')

@section('content')  --}}

{{--  <x-debugbar/>  --}}
<x-app>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                <a href="/answer" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="pt-4 pb-4 pl-4 pr-4 mt-5 border rounded">
                    <h1 class="display-4">Edit Answer</h1>
                    <p>Edit and submit this form to update a answer</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Post Answer</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Answer Title" value="{{ $answer->title }}" required>
                            </div>
                            <div class="mt-2 control-group col-12">
                                <label for="body">Post Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Answer Body"
                                          rows="5" required>{{ $answer->body }}</textarea>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center control-group col-12">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </x-app>    
{{--  
@endsection  --}}