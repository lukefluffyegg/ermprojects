@if(Session::has('info'))
    <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-info" role="alert">
        {{ Session::get('info') }}
    </div>
    </div>
@endif