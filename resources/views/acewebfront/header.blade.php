<header>
    <nav id="myTopnav" class="topnav">
        @foreach (getnav() as $v)
            <a href="{{ url($v['link']) }}"
                @if (Request::is($v['link'] . '*')) class="active" @endif>{{ $v['name'] }}</a>
        @endforeach
        @if (Session::get('id_account') != null)
            <a href="{{route('gosford.logouts')}}"  class="active">Logout</a>
        @else
            <a target="_blank" href="{{ route('gosford.login') }}" class="ace-button" >
                Login GSAP
            </a>
        @endif

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>
<div style="overflow: hidden;padding-right: 20px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a style="color:black;" class="dropdown-item" href="https://gtp.ace2u.com/"
        target="_blank">GTP Login</a>
    <a style="color:black;" class="dropdown-item" href="#" style="width:100%;"
        data-bs-toggle="modal" data-bs-target="#exampleModal"> Staff Login</a>

</div>

<script>
    function logoutFunction() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "you want to leave this page?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "{{ route('staff.logoutstuff') }}";
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //     'Cancelled',
                //     'Your imaginary file is safe :)',
                //     'error'
                // )
            }
        })

    }
</script>
