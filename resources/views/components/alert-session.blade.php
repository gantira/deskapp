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
    {{ session('success') }}
</div>
@endif
