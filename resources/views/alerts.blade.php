<!-- Exibindo success -->
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show text-center my-1" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Exibindo errors -->
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show text-center y-1" role="alert">
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Exibindo messages -->
@if (Session::has('message'))
<div class="alert alert-warning alert-dismissible fade show text-center y-1" role="alert">
    <strong>{{ Session::get('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif