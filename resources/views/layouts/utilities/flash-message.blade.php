@if (session('success'))
<div class="alert alert-success alert-dismissible fade show alert-has-icon" role="alert">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
        <button class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert-title">Berhasil!</div>
        {{ session('success') }}
    </div>
</div>
@endif