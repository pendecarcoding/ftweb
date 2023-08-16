@if ($errors->any())
    @foreach ($errors->all() as $eror)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">

            <strong>Opps!</strong>  {{ $eror }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>


    @endforeach
@endif
@if (Session::has('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">

        <i class="icon fa fa-check"></i>
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">

        <i class="icon fa fa-warning"></i>
        {{ Session::get('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
