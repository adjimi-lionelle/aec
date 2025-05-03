@if(!empty(session('succès')))
    <div class="alert alert-success" role="alert">
        {{ session('succès') }}
    </div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif