<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="description" content="" />
    <meta name="theme-color" content="#333333" />

    <meta name="generator" content="Hugo 0.104.2" />
    <link rel="icon" href="{{ uploaded_asset(get_setting('system_logo_white')) }}">

    <title>
        @if (!empty($page))
            {{ get_setting('site_name') }} |{{ strtoupper($page) }}
        @else
        {{ get_setting('site_name') }}
        @endif
    </title>
    @yield('meta')
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/" />

    <link rel="stylesheet" type="text/css" href="{{ static_asset('car') }}/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('car') }}/css/templete.min.css">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ static_asset('car') }}/css/skin/skin-1.css">
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ static_asset('car') }}/plugins/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('car') }}/plugins/revolution/css/navigation.css">



    <link href="{{ static_asset('aceweb') }}/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="{{ static_asset('aceweb') }}/assets/ace/mansoryscroll.css" rel="stylesheet" />
    <link href="{{ static_asset('aceweb') }}/assets/ace/company.css" rel="stylesheet" />
    <script src="{{ static_asset('aceweb') }}/assets/mansory/mansory.js"></script>
    <link href="{{ static_asset('aceweb') }}/assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ static_asset('aceweb') }}/assets/carousel/carousel.css" rel="stylesheet" />

    <link href="{{ static_asset('aceweb') }}/assets/ace/gosford1.css" rel="stylesheet" />
    <link href="{{ static_asset('aceweb') }}/assets/ace/ver2.css" rel="stylesheet" />
    <!--<link href="assets/ace/scroll.css" rel="stylesheet" />-->
    <link href="{{ static_asset('aceweb') }}/assets/slick/slick.css" rel="stylesheet" />
    <link href="{{ static_asset('aceweb') }}/assets/slick/slick-theme.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!--TEST-->
    <!--TEST-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/Flip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ static_asset('aceweb') }}/assets/ace/ipadace1.css" rel="stylesheet" />
    <link href="{{ static_asset('aceweb') }}/assets/gosford/gosford.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lightgallery-bundle.css" rel="stylesheet">
    <style>
        #pdfviewer {
            border: 1px #333 solid;
            width: 100%;
            background: #eee;
        }


        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #bf1e2d;
            color: white;
            cursor: pointer;
            /* padding: 15px; */
            border-radius: 50%;
        }

        #myBtn:hover {
            background-color: #555;
        }

        .bg-primary {
            background-color: #212529;
        }
        .theme-btn.bt-support-now {
            display: none;
        }
        .theme-btn.bt-buy-now {
            display: none;
        }
    </style>

    <!-- Google tag (gtag.js) -->
    @if (get_setting('google_analytics') == 1)
       <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-801CJXHWZ0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-801CJXHWZ0');
</script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/lightgallery.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/video/lg-video.umd.js"></script>

</head>

<body>
    <!--<div class="centerloader">
    <div id="loader" class="loader"></div>
</div>-->
    <!--div id="divbody" data-aos="fade-up" class="divbody">-->




    @include('acewebfront.header')

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"
            aria-hidden="true"></i></button>
    <div class="page-wraper">
        @yield('content')
    </div>
    <div id="chat" class="wa-floating-button" onclick="toggleChat()">
        <span class="whatsapp-icon"><img id="chat-icon" src="/public/assets/img/chat.png"></span>
    </div>
    <div id="pop-up-chat" class="body-chat" style="display: none;">

        <div class="card">
            <form id="contact-form-popup" method="post">
                @csrf
                <div class="card-header" style="color:white;background-color: #F80814;"><img style="height: 30px;"
                        src="/public/assets/img/chat.png"> Message</div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Name *" required name="name">
                    <br>
                    <input type="text" class="form-control" placeholder="Contact Number *" required
                        name="phone">
                    <br>
                    <input type="email" class="form-control" placeholder="Email *" required name="email">
                    <br>
                    <textarea style="height:150px" name="comment" class="form-control" required></textarea>




                </div>
                <div class="card-footer">
                    <div id="alert-message-popup">
                        <div class="alert alert-success"> <a href="#" class="close" data-bs-dismiss="alert" aria-label="close">×</a> <strong>Success!</strong> your message has been sent. </div>
                    </div>
                    <button type="submit" style="width:100%;background-color: #F80814;color:white" class="btn">
                        <span id="btn-text">Submit</span>
                        <img id="loading-gif" src="/public/assets/img/loading.gif"
                            style="width: 20px;height:20px;display: none;">
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">


                <div class="card text-left">
                    <div class="card-body" style="
                    padding: 50px;
                ">
                        <div class="mb-5 text-center">
                            <img style="width: 127px;" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="mw-100 mb-4"
                                height="50">
                            <h1 style="color: #6d6d6d;font-size: 20px;" class="h3  mb-0">Staff Login</h1>

                        </div>
                        <form class="pad-hor" method="POST" role="form" action="{{ route('staff.login') }}">
                            {{ csrf_field() }}
                            <div style="margin-left: 20px;margin-right: 20px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            style="height: 40px;
                                      border-radius: 0px;"
                                            class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <input required name="username" type="text" class="form-control"
                                        placeholder="Staff ID" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            style="height: 40px;
                                      border-radius: 0px;"
                                            class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="row mb-2">

                            </div>
                            <div class="form-group">
                                <button
                                    style="width:100%;background-color: #dc3545;
                                border: #dc3545;"
                                    type="submit" class="btn btn-primary btn-lg btn-block">
                                    LOGIN
                                </button>
                                <br>
                                <center>
                                    <p style="margin-top: 5px;color:#959595">Don't have an account? <span><a
                                                style="color:#959595;text-decoration: none;"
                                                href="{{ url('registerstaff') }}">Create
                                                account</a></span></p>

                                    <p><span><a style="color:#959595;text-decoration: none;"
                                                href="{{ url('forgotpass') }}">Forgot Password</a></span></p>
                                </center>

                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">


                <div class="card text-left">
                    <div class="card-body" style="
                    padding: 50px;
                ">
                        <div class="mb-5 text-center">
                            <img src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="mw-100 mb-4"
                                height="50">


                        </div>
                        <form class="pad-hor" method="POST" role="form"
                            action="{{ route('gosford.front.actlogin') }}">
                            {{ csrf_field() }}
                            <div style="margin-left: 20px;margin-right: 20px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            style="height: 40px;
                                      border-radius: 0px;"
                                            class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <input required name="username" type="text" class="form-control"
                                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            style="height: 40px;
                                      border-radius: 0px;"
                                            class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="row mb-2">

                            </div>
                            <div class="form-group">
                                <button
                                    style="width: 100%;
                                background-color: #dc3545;
                                border: #dc3545;"
                                    type="submit" class="btn btn-primary btn-lg btn-block">
                                    LOGIN
                                </button>
                                <br>
                                <center>
                                    <p style="margin-top: 5px;color:#959595">Don't have an account? <span><a
                                                style="color:#959595;text-decoration: none;"
                                                href="{{ route('gosford.front.register') }}">Create
                                                account</a></span></p>

                                    <p><span><a style="color:#959595;text-decoration: none;"
                                                href="{{ route('gosford.front.forgotpass') }}">Forgot
                                                Password</a></span></p>
                                </center>

                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>


    @include('acewebfront.fotter')
    <!--</div>-->

    @if (Session::has('wrongpassword'))
        <script>
            // Define a function to be executed when the page finishes loading
            function pageLoaded() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Info Login',
                    text: '{{ Session::get('wrongpassword') }}', // Corrected line
                });

                // You can add your code here that should run after the page loads
            }

            // Attach the 'pageLoaded' function to the onload event of the 'window' object
            window.onload = pageLoaded;
        </script>
    @endif

    @if (Session::has('wrongrecovery'))
        <script>
            // Define a function to be executed when the page finishes loading
            function pageLoaded() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Recovery Code',
                    text: '{{ Session::get('wrongrecovery') }}', // Corrected line
                });

                // You can add your code here that should run after the page loads
            }

            // Attach the 'pageLoaded' function to the onload event of the 'window' object
            window.onload = pageLoaded;
        </script>
    @endif
    @if (Session::has('changepassdone'))
        <script>
            // Define a function to be executed when the page finishes loading
            function pageLoaded() {
                Swal.fire({
                    icon: 'info',
                    title: 'Information',
                    text: '{{ Session::get('changepassdone') }}', // Corrected line
                });

                // You can add your code here that should run after the page loads
            }

            // Attach the 'pageLoaded' function to the onload event of the 'window' object
            window.onload = pageLoaded;
        </script>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const canvas = document.getElementById("hero-lightpass");





        $('#requestpatnerform').submit(function(event) {
            event.preventDefault();
            $("#loading").show();
            $.ajax({
                url: '{{ route('forcorporate.addrequest') }}',
                type: 'POST',
                data: $('#requestpatnerform').serialize(),
                success: function(response) {
                    if (response == "success") {

                        $("#alertpatner").show();
                        $("#requestpatnerform")[0].reset();
                    }
                },
                complete: function() {
                    $("#loading").hide();
                }
            });
        });
    </script>
    <script>
        var myVar;

        function LoadFunction() {
            myVar = setTimeout(showPage, 1500);
        }

        function showPage() {

            document.getElementById("loader").style.display = "none";
            document.getElementById("divbody").style.display = "block";
        }
    </script>

    <script type="text/javascript">
//       let allowScroll = true;
// let allowKeyboard = true;

// document.addEventListener("keydown", function (e) {
//   if (allowKeyboard && e.ctrlKey && (e.keyCode == "61" || e.keyCode == "107" || e.keyCode == "173" || e.keyCode == "109" || e.keyCode == "187" || e.keyCode == "189")) {
//     e.preventDefault();
//   }
// });

// document.addEventListener("wheel", function (e) {
//   if (allowScroll && e.ctrlKey) {
//     e.preventDefault();
//   }
// }, { passive: false });



        </script>


    <script type="text/javascript">
        var scrollnum = 300;

        // Get the button
        let mybutton = document.getElementById("myBtn");


        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        function progressBarScroll() {
            let navbarspace = document.getElementById("spaceheader");
            const element = document.querySelector('.header-curve .logo-header');
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
                height = document.documentElement.scrollHeight - document.documentElement.clientHeight,
                scrolled = (winScroll / height) * 155;

            // Check if the screen width is less than or equal to a threshold (e.g., 768 pixels) to identify mobile devices


            // Rest of your code...
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
                if (window.innerWidth <= 1024) {
                    // Set the background color to white for mobile devices
                    // navbarspace.style.backgroundColor = "#333";
                } else {
                    // For non-mobile devices, set the background color to transparent
                    // navbarspace.style.backgroundColor = "white";
                    navbarspace.classList.add("shadow-navbar");
                    if (element) {
                        // Create a style for the ::before pseudo-element
                        const beforePseudoElementStyle = document.createElement('style');
                        beforePseudoElementStyle.textContent = `
        .header-curve .logo-header::before {
            background-color: white;
        }
    `;

                        // Append the style to the document's head
                        document.head.appendChild(beforePseudoElementStyle);
                    }
                    // black_navbar.classList.add("path_shap");
                }
            } else {
                mybutton.style.display = "none";
                if (window.innerWidth <= 1024) {
                    // Set the background color to white for mobile devices
                    // navbarspace.style.backgroundColor = "#333";
                } else {
                    // For non-mobile devices, set the background color to transparent
                    navbarspace.classList.remove("shadow-navbar");

                    // navbarspace.style.backgroundColor = "transparent";
                    // black_navbar.classList.remove("path_shap");
                }
            }
            if (scrolled >= 30 && scrolled <= 100) {
                scrollnum = 250;
                document.getElementById("progressBar").style.height = scrolled + "%";
            }
            // if(scrolled >= 90 && scrolled <= 100){
            //     scrollnum = 200;
            //     document.getElementById("progressBar").style.height = "30%";
            // }
            if (scrolled <= 100 && scrolled >= 56) {
                document.getElementById("progressBar").style.height = scrolled + "%";
            }
            // if (scrolled == 90){
            //     alert("dah 90 dah");
            // }

        }

        window.onscroll = function() {

            progressBarScroll();


        };
    </script>
    <script>
        // Get all anchor links with the "noScrollLink" class
        const noScrollLinks = document.querySelectorAll(".noScrollLink");

        // Add a click event listener to each anchor link
        noScrollLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                // Prevent the default behavior (scrolling to the top)
                event.preventDefault();

                // Add your custom behavior here if needed
                // For example, you can scroll to a specific section of the page
                // or perform other actions.
            });
        });
    </script>
    <script type="text/javascript">
        function fadeingtp(section, classname) {
            var element = document.getElementById("myDIV");
            var classfromdiv = document.getElementById("myDIV").className;
            //console.log(classfromdiv);



        }

        $(window).on("scroll", function() {

            //document.getElementById("progressBar").style.height =  window.innerHeight;




            if (
                $(window).scrollTop() >=
                $(".number").offset().top +
                $(".number").outerHeight() -
                window.innerHeight
            ) {
                if (!localStorage.getItem("visited")) {
                    $(".number").each(function() {
                        $(this)
                            .prop("Counter", 0)
                            .animate({
                                Counter: $(this).text(),
                            }, {
                                duration: 2000,
                                easing: "swing",
                                step: function(now) {
                                    $(this).text(Math.ceil(now));
                                },
                            });
                    });
                    $(".decimal").each(function() {
                        $(this)
                            .prop("Counter", 0)
                            .animate({
                                Counter: $(this).text(),
                            }, {
                                duration: 2000,
                                easing: "swing",
                                step: function(now) {
                                    $(this).text(parseFloat(now).toFixed(1));
                                },
                            });
                    });
                    localStorage.setItem("visited", true);
                }
            } else {
                localStorage.removeItem("visited");
            }
        });


        $(document).ready(function() {

            $(window).on("scroll", function() {

                if (
                    $(window).scrollTop() >=
                    $(".company-ace").offset().top +
                    $(".company-ace").outerHeight() -
                    window.innerHeight
                ) {
                    document.getElementById("gtp").style.display = "block";
                    document.getElementById("gpt1").style.height = "600px";
                    document.getElementById("gpt2").style.height = "600px";
                    document.getElementById("gpt3").style.height = "600px";
                    document.getElementById("gpt4").style.height = "600px";
                    document.getElementById("gpt5").style.height = "600px";


                }





                if (
                    $(window).scrollTop() >=
                    $("#mansory").offset().top +
                    $("#mansory").outerHeight() -
                    window.innerHeight
                ) {

                    $(".grid-item").each(function(i) {
                        setTimeout(function() {
                            $(".grid-item").eq(i).addClass("is-visible");
                        }, 200 * i);
                    });


                }

                if (
                    $(window).scrollTop() >=
                    $("#nonmansory").offset().top +
                    $("#nonmansory").outerHeight() -
                    window.innerHeight
                ) {

                    $(".grid-item").each(function(i) {
                        setTimeout(function() {
                            $(".grid-item").eq(i).removeClass("is-visible");
                        }, 200 * i);
                    });


                }
                if (
                    $(window).scrollTop() >=
                    $("#gpt0").offset().top +
                    $("#gpt0").outerHeight() -
                    window.innerHeight
                ) {
                    var to = document.getElementById("to-progress");
                    var img = document.getElementById("imggpt1");
                    var titleprogress = document.getElementById("title-progress");
                    var contentprogress = document.getElementById("content-progress");
                    //$("#imggpt1").fadeIn(30);
                    //changeimage("{{ static_asset('aceweb') }}/assets/img/gtp1.png");




                    to.innerHTML = "1/5";
                    titleprogress.innerHTML = "Online ordering system";
                    contentprogress.innerHTML =
                        "Through our GSAP system which provides a comprehensive options for our business partners when placing orders with us.";

                    $(".gptimg-responsive").addClass("is-visible");

                }
                if (
                    $(window).scrollTop() >=
                    $("#gpt1").offset().top +
                    $("#gpt1").outerHeight() -
                    window.innerHeight
                ) {
                    var to = document.getElementById("to-progress");
                    var titleprogress = document.getElementById("title-progress");
                    var contentprogress = document.getElementById("content-progress");
                    //changeimage("{{ static_asset('aceweb') }}/assets/img/gtp2.png");
                    //$("#imggpt1").fadeIn(3000);
                    //document.getElementById("imggpt1").src="{{ static_asset('aceweb') }}/assets/img/gtp2.png";
                    $(".gptimg-responsive").addClass("is-visible");
                    to.innerHTML = "2/5";
                    titleprogress.innerHTML = "Wide range of vehicle models";
                    contentprogress.innerHTML =
                        "A broad range of vehicle model make, model & year model to choose from which enable our business partners to serve their end customers better.";


                }
                if (
                    $(window).scrollTop() >=
                    $("#gpt2").offset().top +
                    $("#gpt2").outerHeight() -
                    window.innerHeight
                ) {
                    var to = document.getElementById("to-progress");
                    var titleprogress = document.getElementById("title-progress");
                    var contentprogress = document.getElementById("content-progress");
                    //$("#imggpt1").fadeIn(3000);
                    //document.getElementById("imggpt1").src="{{ static_asset('aceweb') }}/assets/img/gtp3.png";
                    //changeimage("{{ static_asset('aceweb') }}/assets/img/gtp3.png");
                    $(".gptimg-responsive").addClass("is-visible");
                    to.innerHTML = "3/5";
                    titleprogress.innerHTML =
                        "No room of failure.";
                    contentprogress.innerHTML =
                        "With the comprehensive options available supported with a schematic diagram that goes almost instantly to our production line to meet short delivery period.";

                }
                if (
                    $(window).scrollTop() >=
                    $("#gpt3").offset().top +
                    $("#gpt3").outerHeight() -
                    window.innerHeight
                ) {

                    var to = document.getElementById("to-progress");
                    var titleprogress = document.getElementById("title-progress");
                    var contentprogress = document.getElementById("content-progress");
                    //changeimage("{{ static_asset('aceweb') }}/assets/img/gtp4.png");
                    //$("#imggpt1").fadeIn(3000);
                    // document.getElementById("imggpt1").src="{{ static_asset('aceweb') }}/assets/img/gtp4.png";
                    $(".gptimg-responsive").addClass("is-visible");
                    to.innerHTML = "4/5";
                    titleprogress.innerHTML =
                        "Seamless integration";
                    contentprogress.innerHTML =
                        "Design pattern selected are being connected to our design pattern high tech equipment with less human intervention.";

                }
                if (
                    $(window).scrollTop() >=
                    $("#gpt4").offset().top +
                    $("#gpt4").outerHeight() -
                    window.innerHeight
                ) {

                    var to = document.getElementById("to-progress");
                    var titleprogress = document.getElementById("title-progress");
                    var contentprogress = document.getElementById("content-progress");
                    //$("#imggpt1").fadeIn(3000);
                    //document.getElementById("imggpt1").src =
                    //   "{{ static_asset('aceweb') }}/assets/img/gtp4.png";
                    //changeimage("{{ static_asset('aceweb') }}/assets/img/gtp4.png");
                    var height = $("#gpt4").outerHeight() - window.innerHeight + "vh";
                    to.innerHTML = "5/5";
                    titleprogress.innerHTML =
                        "Order fulfillment";
                    contentprogress.innerHTML =
                        "Orders received are fully monitored and tracked of its status ensuring delivery dates requested by our business partners vis vis to end client are met.";

                }
                if ($(window).scrollTop() >=
                    $("#gpt5").offset().top +
                    $("#gpt5").outerHeight() -
                    window.innerHeight) {

                    const myDiv = document.getElementById("gtp-patner-focused");
                    // myDiv.scrollIntoView();

                }
                if ($(window).scrollTop() >=
                    $("#gpt6").offset().top +
                    $("#gpt6").outerHeight() -
                    window.innerHeight) {
                    // document.getElementById("gtp").style.display = "none";

                }

            });
        });
    </script>

    <script>
        function myFunction() {
            var y = document.getElementById("acetopbar");
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.style.left = "0%";
                x.className += " responsive";
                y.style.display = "none";
            } else {
                x.className = "topnav";
                y.style.display = "block";
            }
        }
    </script>

    <script src="{{ static_asset('aceweb') }}/assets/vendor/aos/aos.js"></script>
    <!-- <script src="{{ static_asset('aceweb') }}/assets/js/mansoryscroll.js"></script> -->

    <!--Mansory Scroll-->
    @php
        $datapatner = getPatner();
    @endphp
    <script src="{{ asset('public/go_system') }}/js/material.min.js"></script>
    <script>
        var images = [
            @foreach ($datapatner as $i => $p)
                "{{ getimage($p->image) }}",
            @endforeach
        ];
        var lists = document.getElementsByClassName("selfie-img");
        var list = lists;
        // console.log(lists);
        // console.log(list);
        // Var or Let works in the for loop
        let counter = 0;
        let counter2 = 0;
        for (let i = 0; i < lists.length; i++) {
            // console.log(list[i]);
            if (i < images.length) {
                list[i].style.backgroundImage = "url(" + images[i] + ")";
            } else if (i < 2 * images.length) {
                list[i].style.backgroundImage = "url(" + images[counter] + ")";
                counter = counter + 1;
            } else {
                list[i].style.backgroundImage = "url(" + images[counter2] + ")";
                counter2 = counter2 + 1;
            }
        }

        var clone1 = $(".col1 ul li").clone();
        clone1.appendTo(".col1 ul");
        var clone2 = $(".col2 ul li").clone();
        clone2.appendTo(".col2 ul");
        var clone3 = $(".col3 ul li").clone();
        clone3.appendTo(".col3 ul");
    </script>
    <!--END MAnsory-->
    <script src="{{ static_asset('aceweb') }}/assets/ace/gtpscroll.js" type="text/javascript"></script>
    <script src="{{ static_asset('aceweb') }}/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ static_asset('aceweb') }}/assets/dist/js/light-galery-all.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script>
        if (!window.Cypress) AOS.init();
    </script>
    <!-- <script type="text/javascript">
        $(".slider-service").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script> -->
    <!-- <script>
        let magicGrid = new MagicGrid({
            container: ".mansory",
            animate: true,
            gutter: 30,
            static: true,
            useMin: true,
        });

        magicGrid.listen();
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // Masonry Grid
            $(".grid").masonry({
                itemSelector: ".grid-item",
                columnWidth: 180,
                fitWidth: true, // When enabled, you can center the container with CSS.
                gutter: 10
            });

            // Loading Animation
            /*$(".grid-item").each(function (i) {
              setTimeout(function () {
                $(".grid-item").eq(i).addClass("is-visible");
              }, 200 * i);
            });*/

            // Fancybox
            $(".fancybox").fancybox({
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            });
        });
    </script>



    <script>
        window.addEventListener("online",
            () => livestatus("online")
        );
        window.addEventListener("offline",
            () => livestatus("offline")

        );

        function livestatus(status) {
            if (status == "online") {
                document.getElementById("statuslive").innerHTML = 'LIVE';
                document.getElementById("statuslive").style.color = "#1ac69c";
                document.getElementById("tradeopen-mobile").style.color = "#1ac69c";
                connect();
            } else {

                document.getElementById("statuslive").innerHTML = 'NO INTERNET';
                document.getElementById("statuslive").style.color = "red";

                document.getElementById("tradeopen-mobile").innerHTML = 'NO INTERNET';
                document.getElementById("tradeopen-mobile").style.color = "red";

            }
        }
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

                window.location.href = "{{url('/staff/back/logoutstuff')}}";
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


    <script></script>

    <script>
        window.addEventListener('wheel', function(event) {
            if (event.ctrlKey == true) {
                event.preventDefault();
            }
        });
    </script>

    <script>
        var chatIconClicked = false;

        function toggleChat() {
            var popUpChat = document.getElementById("pop-up-chat");
            var chatIcon = document.getElementById("chat-icon");
            var whatsappIcon = document.querySelector(".wa-floating-button");

            if (!chatIconClicked) {
                // Change the image to times.png
                chatIcon.src = "/public/assets/img/times.png";
                chatIcon.classList.add("times-icon");
                whatsappIcon.classList.add("active");
                chatIconClicked = true;
            } else {
                // Change the image back to chat.png
                chatIcon.src = "/public/assets/img/chat.png";
                chatIcon.classList.remove("times-icon");
                whatsappIcon.classList.remove("active");
                chatIconClicked = false;
            }

            if (popUpChat.style.display === "none" || popUpChat.style.display === "") {
                popUpChat.style.display = "block";
            } else {
                popUpChat.style.display = "none";
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            var form = $("#contact-form-popup");
            var submitBtn = $("#submit-btn");
            var btnText = $("#btn-text");
            var loadingGif = $("#loading-gif");

            form.submit(function(event) {
                event.preventDefault();
                // Disable the submit button and show the loading GIF
                submitBtn.prop("disabled", true);
                btnText.hide();
                loadingGif.show();
                var formData = form.serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('message.popup') }}",
                    data: formData,
                    success: function(response) {
                        // Handle the successful response here
                        console.log(response);
                        if (response == "success") {
                            $("#contact-form-popup")[0].reset();
                            $("#alert-message-popup").show();
                        }
                        // You can display a success message or perform other actions

                        // Re-enable the submit button and hide the loading GIF
                        submitBtn.prop("disabled", false);
                        btnText.show();
                        loadingGif.hide();
                    },
                    error: function(error) {
                        // Handle errors here
                        console.error(error);

                        // Re-enable the submit button and hide the loading GIF
                        submitBtn.prop("disabled", false);
                        btnText.show();
                        loadingGif.hide();
                    },
                });
            });
        });
    </script>





    <script src="{{ static_asset('car') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP.MIN JS -->


    <!-- JavaScript  files ========================================= -->
    <script src="{{ static_asset('car') }}/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
    <script src="{{ static_asset('car') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP.MIN JS -->


    <script src="{{ static_asset('car') }}/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->

    <script src="{{ static_asset('car') }}/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->


    <script src="{{ static_asset('car') }}/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
    <script src="{{ static_asset('car') }}/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script src="{{ static_asset('car') }}/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
    <script src="{{ static_asset('car') }}/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
    <script src="{{ static_asset('car') }}/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
    <script src="{{ static_asset('car') }}/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
    <script src="{{ static_asset('car') }}/js/custom.min.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="{{ static_asset('car') }}/js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
    <script src="{{ static_asset('car') }}/js/dz.ajax.js"></script><!-- CONTACT JS -->

    <!-- REVOLUTION JS FILES -->
    <script src="{{ static_asset('car') }}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.migration.min.js">
    </script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js">
    </script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js">
    </script>
    <script src="{{ static_asset('car') }}/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="{{ static_asset('car') }}/js/rev.slider.js"></script>
    <script src="{{ static_asset('car') }}/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
    <script>
        jQuery(document).ready(function() {
            'use strict';
            dz_rev_slider_1();
        }); /*ready*/
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
  // Check if it's a tablet in portrait mode
  if (isTabletPortrait()) {
    // Request landscape orientation
    requestLandscapeOrientation();
  }
});

function isTabletPortrait() {
  return window.matchMedia("(orientation: portrait) and (max-width: 768px)").matches;
}

function requestLandscapeOrientation() {
  if (screen.orientation && screen.orientation.lock) {
    screen.orientation.lock('landscape');
  }
}

        </script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>

</body>

</html>
