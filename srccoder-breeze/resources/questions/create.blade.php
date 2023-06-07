{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<x-srccoder>
    <div class="container">
        <div class="row">
            <div class="pt-2 col-12">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="pt-4 pb-4 pl-4 pr-4 mt-5 border rounded">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>

                    <hr>
{{--                    //$table->id();--}}
{{--                    //$table->foreignId('user_id'); // user_id of our question--}}
{{--                    //$table->text('title');  // Title of our question--}}
{{--                    //$table->longText('body');   // Body of our question--}}
{{--                    //$table->foreignId('bounty_id');--}}
{{--                    //$table->foreignId('programming_language_id');--}}
{{--                    //$table->foreignId('technology_category_id');--}}
{{--                    //$table->string('slug')->unique();//slug is a url friendly version of the title--}}
{{--                    //$table->boolean('is_answered')->default(false);--}}
{{--                    //$table->timestamps();--}}

                    <form action="" method="POST">
                        @csrf
{{--                        'title' => $request->title,--}}
{{--                        'body' => $request->body,--}}
{{--                        'user_id' => $request->user_id,--}}
{{--                        'bounty_id' => $request->bounty_id,--}}
{{--                        'programming_language_id' => $request->programming_language_id,--}}
{{--                        'technology_category_id' => $request->technology_category_id,--}}
{{--                        'slug' => $request->slug,--}}
{{--                        'is_answered' => $request->is_answered--}}
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Question Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Question Title" required>
                            </div>
                            <div class="mt-2 control-group col-12">
                                <label for="body">Post Question</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="" required></textarea>
                            </div>
                            <div class="mt-2 control-group col-12">
                                <label for="bounty">Post Question</label>
                                <input id="bounty" class="form-control" name="body" placeholder="Enter Question Bounty"
                                          rows="" required></input>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center control-group col-12">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create (Ask Question)
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-srccoder>
{{--@endsection--}}
