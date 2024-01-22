<!-- Add this form within your blade template -->
<form method="POST" action="{{ route('add-test-results') }}">
    @csrf
    <div class="form-group">
        <label for="result">Result:</label>
        <input type="text" id="result" name="result">
    </div>
    @foreach ($categories as $category)
        @foreach ($category->tests as $test)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="test_{{ $test->id }}" name="selected_tests[]" value="{{ $test->id }}">
                <label class="form-check-label" for="test_{{ $test->id }}">{{ $test->name }}</label>
            </div>
        @endforeach
    @endforeach
    <button type="submit" class="btn btn-primary">Add Results</button>
</form>