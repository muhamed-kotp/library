@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <h6 class="error-type">{{ $error }}</h6>
        @endforeach

    </div>

@endif
