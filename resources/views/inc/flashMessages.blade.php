@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger col-lg-6 col-md-6 mx-auto mt-3 py-2">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success col-lg-6 col-md-6 mx-auto mt-3 py-2">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger col-lg-6 col-md-6 mx-auto mt-3 py-2">
        {{ session('error') }}
    </div>
@endif
