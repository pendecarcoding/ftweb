<header class="site-header header mo-left header-style-1">
    <!-- top bar END-->
    <!-- main header -->
    <div id="spaceheader" class="sticky-header header-curve main-bar-wraper navbar-expand-lg">
        <div class="main-bar bg-fytech clearfix ">
            <div class="container clearfix">
                <!-- website logo -->
                <div id="black_navbar" class="logo-header logo-white mostion"><a href="{{url('/')}}"><img src="{{ uploaded_asset(get_setting('system_logo_white')) }}"
                            width="193" height="89" alt=""></a></div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <!-- <div class="extra-nav">
                    <div class="extra-cell">
                        <button id="quik-search-btn" type="button" class="site-button bg-primary-dark"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div> -->
                <!-- Quik search -->
                <!-- <div class="dlab-quik-search bg-primary">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control"
                            placeholder="Type to search">
                        <span id="quik-search-remove"><i class="fas fa-times"></i></span>
                    </form>
                </div> -->
                <!-- main nav -->
                <div  class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="nav navbar-nav nav-style">
                       @foreach(getmenudynamicmain() as $i => $v)
                       @if($v->label_menu=='Login')
                       <li class="ace-button @if (Request::is($v->url_menu . '*'))active @endif"> <a target="{{$v->target}}" href="@if(count(checkchild($v->id)) > 0)javascript:; @else {{url($v->url_menu)}} @endif">{{$v->label_menu}} @if(count(checkchild($v->id)) > 0)<i class="fas fa-chevron-down"></i>@endif</a>

                       @else
                        <li class="@if (Request::is($v->url_menu . '*'))active @endif"> <a target="{{$v->target}}" href="@if(count(checkchild($v->id)) > 0)javascript:; @else {{url($v->url_menu)}} @endif">{{$v->label_menu}} @if(count(checkchild($v->id)) > 0)<i class="fas fa-chevron-down"></i>@endif</a>
                       @endif
                           @if(count(checkchild($v->id)) > 0)
                           <ul class="sub-menu">
                               @foreach(checkchild($v->id) as $isub => $vsub)

                                @if(count(checkchild($vsub->id)) > 0)
                                 <li> <a target="{{$vsub->target}}" href="javascript:;">{{$vsub->label_menu}}<i class="fas fa-angle-right"></i></a>
                                   <ul class="sub-menu">
                                       @foreach(checkchild($vsub->id) as $isubs => $vsubs)
                                        @if(count(checkchild($vsubs->id)) > 0)
                                       <li> <a href="javascript:;">{{$vsubs->label_menu}} <i class="fas fa-angle-right"></i></a>
                                           <ul class="sub-menu">
                                               <li><a href="header-style-1.html">Header 1</a></li>
                                               <li><a href="header-style-2.html">Header 2</a></li>
                                               <li><a href="header-style-3.html">Header 3</a></li>
                                               <li><a href="header-style-4.html">Header 4</a></li>
                                               <li><a href="header-style-5.html">Header 5</a></li>
                                               <li><a href="header-style-6.html">Header 6</a></li>
                                               <li><a href="header-style-7.html">Header 7</a></li>
                                           </ul>
                                       </li>
                                       @else
                                       <li> <a target="{{$vsubs->target}}" href="{{url($vsubs->url_menu)}}">{{$vsubs->label_menu}}</a>
                                       @endif
                                       @endforeach
                                   </ul>
                                </li>

                                @else
                                <li><a target="{{$vsub->target}}" href="{{url($vsub->url_menu)}}">{{$vsub->label_menu}}</a></li>
                                @endif


                               @endforeach
                            </ul>
                           @endif

                        </li>
                        @endforeach
                        <!-- <li> <a href="javascript:;">Features<i class="fas fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li> <a href="javascript:;">Header <i class="fas fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="header-style-1.html">Header 1</a></li>
                                        <li><a href="header-style-2.html">Header 2</a></li>
                                        <li><a href="header-style-3.html">Header 3</a></li>
                                        <li><a href="header-style-4.html">Header 4</a></li>
                                        <li><a href="header-style-5.html">Header 5</a></li>
                                        <li><a href="header-style-6.html">Header 6</a></li>
                                        <li><a href="header-style-7.html">Header 7</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Footer <i class="fas fa-angle-right"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                        <li><a href="footer-white.html">Footer White</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<div>
    <div style="margin-top: 55vh;" class="modal" id="myLogin">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <center><img style="width:100%" src="{{ uploaded_asset(get_setting('system_logo_white')) }}"
                            height="50"></center>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <center>Select Login Accounts</center>
                    <div style="display: flex;gap:5px;margin-top: 20px;">
                        <a href="{{ route('mobile.login.staff') }}" style="width:100%" class="btn btn-danger"><i
                                class="fa fa-user"></i> STAFF</a>
                        <!-- <a href="{{ route('mobile.login.user') }}" style="width:100%" class="btn btn-danger"><i
                               class="fa fa-user"></i> USER</a> -->
                        <a href="https://www.gosfordseat.com/gsap.php" target="_blank" style="width:100%"
                            class="btn btn-danger"><i class="fa fa-user"></i> GSAP</a>
                    </div>
                </div>

                <!-- Modal footer -->


            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Get references to the icon and navbar-mobile elements
        var $navbarToggle = $('#navbarToggle');
        var $mobileMenu = $('#mobileMenu');
        var $menuIcon = $('.menu-icon');
        var $timesIcon = $('.times-icon');

        // Add a click event handler to the icon
        $navbarToggle.click(function() {
            // Toggle the 'active' class on navbar-mobile
            $mobileMenu.toggleClass('active');

            // Toggle the icons
            $menuIcon.toggle();
            $timesIcon.toggle();

            // Check if the 'active' class is present
            if ($mobileMenu.hasClass('active')) {
                // If it's active, show the navbar with animation
                $mobileMenu.slideDown();
            } else {
                // If it's not active, hide the navbar with animation
                $mobileMenu.slideUp();
            }
        });
    });
</script>


<script>
    const aboutToggle = document.querySelector('#navbarDarkDropdownMenuLink');
    const aboutDropdown = document.querySelector('.dropdown-menus');

    aboutToggle.addEventListener('click', function(e) {
        e.preventDefault();
        if (aboutDropdown.style.display === 'none' || aboutDropdown.style.display === '') {
            aboutDropdown.style.display = 'block';
        } else {
            aboutDropdown.style.display = 'none';
        }
    });

    // Close the dropdown when clicking outside
    window.addEventListener('click', function(e) {
        if (!aboutToggle.contains(e.target) && !aboutDropdown.contains(e.target)) {
            aboutDropdown.style.display = 'none';
        }
    });
</script>

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
