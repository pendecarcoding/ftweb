<header>
    <nav id="myTopnav" class="topnav">
        @foreach (getnav() as $v)
            <a href="{{ url($v['link']) }}"
                @if (Request::is($v['link'] . '*')) class="active" @endif>{{ $v['name'] }}</a>
        @endforeach
        @if (Session::get('loginstaff') == true)
            <a href="{{ url('staff/back/announcements') }}"
                @if (Request::is('staff/back/announcements')) class="active" @endif>Staff</a>
        @endif


        <a target="_blank" href="{{ route('gosford.login') }}" class="ace-button">
            Login GSAP
        </a>

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>

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
