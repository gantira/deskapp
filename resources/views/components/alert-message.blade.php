@if (session('sent'))
<div class="alert alert-success">
    <i class="icon-copy dw dw-mail"></i>
    {{ session('sent') }}
</div>
@endif

@if (session('failure'))
<div class="alert alert-danger">
    {{ session('failure') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    <i class="icon-copy dw dw-checked"></i>
    {{ session('success') }}
</div>
@endif

@if (session('info'))
<div class="alert alert-info">
    <i class="icon-copy fa fa-info-circle" aria-hidden="true"></i>
    {!! session('info') !!}
</div>
@endif
