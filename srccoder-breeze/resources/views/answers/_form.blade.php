{{--  <form method="POST" action="{{ route('answers.store', ['slug' => $question->slug]) }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Your Answer</label>
        <textarea class="form-control" name="body"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>  --}}
<div class="flex items-stretch justify-stretch place-content-around">
    <form id="answerForm" method="POST" action="{{ route('answers.store', ['slug' => $question->slug]) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Your Note</label>
            <textarea class="form-control" name="note"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Your Code</label>
            <textarea class="form-control" name="code_body"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>